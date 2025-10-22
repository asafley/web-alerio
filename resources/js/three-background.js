import * as THREE from 'three';

export class ThreeBackground {
    constructor(containerId) {
        this.container = document.getElementById(containerId);
        this.scene = null;
        this.camera = null;
        this.renderer = null;
        this.particles = [];
        this.lines = [];
        this.isAnimating = false;
        this.animationId = null;
        this.scrollListener = null;

        this.init();
        this.setupEventListeners();
    }

    init() {
        if (!this.container) return;

        // Scene setup
        this.scene = new THREE.Scene();
        this.scene.background = null;

        // Camera setup
        const width = this.container.clientWidth;
        const height = this.container.clientHeight;
        this.camera = new THREE.PerspectiveCamera(75, width / height, 0.1, 1000);
        this.camera.position.z = 50;

        // Renderer setup
        this.renderer = new THREE.WebGLRenderer({
            alpha: true,
            antialias: true,
            powerPreference: 'high-performance'
        });

        this.renderer.setSize(width, height);
        this.renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
        this.container.appendChild(this.renderer.domElement);

        this.createParticles();
        this.createConnections();
        this.animate();

        // Handle window resize
        window.addEventListener('resize', () => this.onWindowResize());
    }

    createParticles() {
        const particleCount = 40;
        const geometry = new THREE.BufferGeometry();
        const positions = [];
        const sizes = [];

        for (let i = 0; i < particleCount; i++) {
            const x = (Math.random() - 0.5) * 100;
            const y = (Math.random() - 0.5) * 100;
            const z = (Math.random() - 0.5) * 100;

            positions.push(x, y, z);

            const size = Math.random() * 2 + 0.5;
            sizes.push(size);

            this.particles.push({
                position: new THREE.Vector3(x, y, z),
                velocity: new THREE.Vector3(
                    (Math.random() - 0.5) * 0.3,
                    (Math.random() - 0.5) * 0.3,
                    (Math.random() - 0.5) * 0.3
                ),
                originalPosition: new THREE.Vector3(x, y, z),
            });
        }

        geometry.setAttribute('position', new THREE.BufferAttribute(new Float32Array(positions), 3));
        geometry.setAttribute('size', new THREE.BufferAttribute(new Float32Array(sizes), 1));

        const material = new THREE.PointsMaterial({
            color: 0x667eea,
            size: 1.5,
            sizeAttenuation: true,
            transparent: true,
            opacity: 0.8,
        });

        const points = new THREE.Points(geometry, material);
        this.scene.add(points);
        this.particleSystem = points;
    }

    createConnections() {
        const material = new THREE.LineBasicMaterial({
            color: 0x764ba2,
            transparent: true,
            opacity: 1.0,
            linewidth: 2,
        });

        // Create lines connecting nearby particles
        for (let i = 0; i < this.particles.length; i++) {
            for (let j = i + 1; j < Math.min(i + 4, this.particles.length); j++) {
                const geometry = new THREE.BufferGeometry();
                const positions = [
                    this.particles[i].position.x, this.particles[i].position.y, this.particles[i].position.z,
                    this.particles[j].position.x, this.particles[j].position.y, this.particles[j].position.z,
                ];
                geometry.setAttribute('position', new THREE.BufferAttribute(new Float32Array(positions), 3));

                const line = new THREE.Line(geometry, material);
                this.scene.add(line);
                this.lines.push({
                    line: line,
                    particleA: i,
                    particleB: j,
                    maxDistance: 30,
                });
            }
        }
    }

    updateConnections() {
        this.lines.forEach(({ line, particleA, particleB }) => {
            const posA = this.particles[particleA].position;
            const posB = this.particles[particleB].position;
            const distance = posA.distanceTo(posB);

            // Update line opacity based on distance
            const opacity = Math.max(0, 1 - distance / 40);
            line.material.opacity = opacity * 0.3;

            // Update line positions
            const geometry = line.geometry;
            const positions = geometry.attributes.position.array;
            positions[0] = posA.x;
            positions[1] = posA.y;
            positions[2] = posA.z;
            positions[3] = posB.x;
            positions[4] = posB.y;
            positions[5] = posB.z;
            geometry.attributes.position.needsUpdate = true;
        });
    }

    animate = () => {
        this.animationId = requestAnimationFrame(this.animate);

        if (this.isAnimating) {
            // Update particle positions
            this.particles.forEach((particle) => {
                particle.position.add(particle.velocity);

                // Boundary wrapping
                if (Math.abs(particle.position.x) > 50) particle.velocity.x *= -1;
                if (Math.abs(particle.position.y) > 50) particle.velocity.y *= -1;
                if (Math.abs(particle.position.z) > 50) particle.velocity.z *= -1;
            });

            // Update geometry
            const positions = this.particleSystem.geometry.attributes.position.array;
            this.particles.forEach((particle, i) => {
                positions[i * 3] = particle.position.x;
                positions[i * 3 + 1] = particle.position.y;
                positions[i * 3 + 2] = particle.position.z;
            });
            this.particleSystem.geometry.attributes.position.needsUpdate = true;

            // Update connections
            this.updateConnections();

            // Rotate scene
            this.scene.rotation.x += 0.0001;
            this.scene.rotation.y += 0.0002;
        }

        this.renderer.render(this.scene, this.camera);
    };

    setupEventListeners() {
        // Start animation when window is focused
        window.addEventListener('focus', () => {
            this.isAnimating = true;
        });

        // Stop animation when window loses focus
        window.addEventListener('blur', () => {
            this.isAnimating = false;
        });

        // Stop animation on scroll
        this.scrollListener = () => {
            this.isAnimating = false;
        };
        window.addEventListener('scroll', this.scrollListener, { once: true });

        // Start animation on page load
        this.isAnimating = true;
    }

    onWindowResize() {
        if (!this.container) return;

        const width = this.container.clientWidth;
        const height = this.container.clientHeight;

        this.camera.aspect = width / height;
        this.camera.updateProjectionMatrix();
        this.renderer.setSize(width, height);
    }

    destroy() {
        if (this.animationId) {
            cancelAnimationFrame(this.animationId);
        }
        if (this.scrollListener) {
            window.removeEventListener('scroll', this.scrollListener);
        }
        if (this.renderer && this.container) {
            this.container.removeChild(this.renderer.domElement);
        }
    }
}
