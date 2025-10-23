<!-- resources/views/privacy.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body class="bg-light">
    <main className="px-6 md:px-10 py-16 md:py-20 bg-neutral-50">
        <div className="max-w-3xl mx-auto">
            <h1 className="text-3xl md:text-4xl font-semibold">Privacy Policy</h1>
            <p className="mt-2 text-neutral-600 text-sm">Last updated: {updated}</p>

            <p className="mt-6 text-neutral-700">
                This Privacy Policy explains how { companyData.name } (“we,” “us,” or “our”) collects, uses, and shares information when you visit our website or otherwise interact with us. By using our site, you agree to this policy. If you do not agree, please do not use the site.
            </p>

            <section className="mt-10">
                <h2 className="text-xl font-semibold">
                    Information We Collect
                </h2>

                <ul className="mt-3 list-disc list-inside text-neutral-700 space-y-2">
                    <li>
                        <span className="font-medium">Contact information</span> (e.g., name, email, phone) when you submit forms or contact us.
                    </li>

                    <li>
                        <span className="font-medium">Business details</span> you provide for quotes or support (e.g., organization name, service needs).
                    </li>

                    <li>
                        <span className="font-medium">Usage data</span> such as pages viewed, links clicked, and approximate location derived from your IP address. This may be collected via cookies or analytics tools.
                    </li>

                    <li>
                        <span className="font-medium">Support information</span> (e.g., device details, error messages) when you request help.
                    </li>
                </ul>
            </section>

            <section className="mt-8">
                <h2 className="text-xl font-semibold">
                    How We Use Information
                </h2>

                <ul className="mt-3 list-disc list-inside text-neutral-700 space-y-2">
                    <li>
                        To respond to inquiries, provide quotes, and deliver services.
                    </li>

                    <li>
                        To improve our website, services, security, and user experience.
                    </li>

                    <li>
                        To send service or account communications you request.
                    </li>

                    <li>
                        To comply with legal obligations and enforce our terms.
                    </li>
                </ul>
            </section>

            <section className="mt-8">
                <h2 className="text-xl font-semibold">
                    Legal Bases (if applicable)
                </h2>

                <p className="mt-3 text-neutral-700">
                    Where required (e.g., in certain jurisdictions), we rely on legitimate interests, consent, contract performance, and legal obligations as applicable legal bases for processing personal data.
                </p>
            </section>

            <section className="mt-8">
                <h2 className="text-xl font-semibold">
                    Cookies & Analytics
                </h2>
                <p className="mt-3 text-neutral-700">
                    We may use cookies and similar technologies to understand how the site is used and to improve performance. You can typically control cookies through your browser settings. If we implement third-party analytics (e.g., Google Analytics or Microsoft Application Insights), those providers may set their own cookies and process limited information on our behalf in accordance with their policies.
                </p>
            </section>

            <section className="mt-8">
                <h2 className="text-xl font-semibold">
                    Sharing of Information
                </h2>

                <p className="mt-3 text-neutral-700">
                    We do not sell personal information. We may share information with:
                </p>

                <ul className="mt-3 list-disc list-inside text-neutral-700 space-y-2">
                    <li>
                        <span className="font-medium">Service providers</span> who assist us with hosting, analytics, security, communications, or customer support—bound by confidentiality and data-processing terms.
                    </li>

                    <li>
                        <span className="font-medium">Law enforcement or regulators</span>{" "} where required by law or to protect rights, safety, and security.
                    </li>

                    <li>
                        <span className="font-medium">Business transfers</span> (e.g., merger or acquisition)—your information may be transferred as part of the transaction.
                    </li>
                </ul>
            </section>

            <section className="mt-8">
                <h2 className="text-xl font-semibold">
                    Data Retention
                </h2>

                <p className="mt-3 text-neutral-700">
                    We retain personal information only as long as needed for the purposes described above, to comply with legal obligations, or to resolve disputes. Retention periods vary by data type and context.
                </p>
            </section>

            <section className="mt-8">
                <h2 className="text-xl font-semibold">
                    Security
                </h2>

                <p className="mt-3 text-neutral-700">
                    We use reasonable administrative, technical, and physical measures to protect information. No method of transmission or storage is 100% secure, so we cannot guarantee absolute security.
                </p>
            </section>

            <section className="mt-8">
                <h2 className="text-xl font-semibold">
                    Your Choices & Rights
                </h2>

                <ul className="mt-3 list-disc list-inside text-neutral-700 space-y-2">
                    <li>
                        You may contact us to update, correct, or request deletion of your information, subject to applicable law.
                    </li>

                    <li>
                        You can opt out of non-essential emails by following unsubscribe instructions in the message.
                    </li>

                    <li>
                        Depending on your location (e.g., under Colorado or other privacy laws), you may have additional rights such as access, portability, or objection to certain processing.
                    </li>
                </ul>
            </section>

            <section className="mt-8">
                <h2 className="text-xl font-semibold">
                    Children’s Privacy
                </h2>

                <p className="mt-3 text-neutral-700">
                    Our public website is intended for general audiences and is not directed to children under 13. We do not knowingly collect personal information from children via the site. When we support K-12 customers, we process only the information necessary to provide contracted services under agreements with the school or district.
                </p>
            </section>

            <section className="mt-8">
                <h2 className="text-xl font-semibold">
                    Colorado Residents’ Rights
                </h2>

                <p className="mt-3 text-neutral-700">
                    If you are a Colorado resident, you may have certain rights under the Colorado Privacy Act (CPA), including:
                </p>

                <ul className="mt-3 list-disc list-inside text-neutral-700 space-y-2">
                    <li>
                        <span className="font-medium">Right to Access:</span> Request a copy of the personal data we maintain about you.
                    </li>

                    <li>
                        <span className="font-medium">Right to Correction:</span> Request that we correct inaccuracies in your personal data.
                    </li>

                    <li>
                        <span className="font-medium">Right to Deletion:</span> Request that we delete personal data we hold about you.
                    </li>

                    <li>
                        <span className="font-medium">Right to Data Portability:</span> Request a copy of your data in a portable format.
                    </li>

                    <li>
                        <span className="font-medium">Right to Opt-Out:</span> Opt out of the sale of personal data, targeted advertising, or certain types of profiling.
                    </li>
                </ul>

                <p className="mt-3 text-neutral-700">
                    You may exercise these rights by contacting us at <a className="text-blue-700 underline" href={`mailto:${companyData.email}`}>{ companyData.email }</a>. We will verify your request and respond within the timeframe required by law.
                </p>
            </section>

            <section className="mt-8">
                <h2 className="text-xl font-semibold">
                    International Visitors
                </h2>

                <p className="mt-3 text-neutral-700">
                    Our site and services are operated in the United States. If you access the site from outside the U.S., your information may be processed in the U.S. where laws may differ from those in your jurisdiction.
                </p>
            </section>

            <section className="mt-8">
                <h2 className="text-xl font-semibold">
                    Changes to This Policy
                </h2>
                <p className="mt-3 text-neutral-700">
                    We may update this Privacy Policy from time to time. We will post the updated date at the top of this page. Material changes will be highlighted where appropriate.
                </p>
            </section>

            <section className="mt-8">
                <h2 className="text-xl font-semibold">Contact Us</h2>
                <address className="mt-3 not-italic text-neutral-700">
                    { companyData.name }
                    <br />
                    { companyData.address1 }
                    <br />
                    { companyData.address2 }
                    <br />
                    { companyData.city }, { companyData.state } { companyData.zip }
                    <br />
                    <a className="text-blue-700 underline" href={ `tel:${companyData.phone}` }>
                        { companyData.phone }
                    </a>{" "}
                    ·{" "}
                    <a className="text-blue-700 underline" href={ `mailto:${companyData.email}` }>
                        { companyData.email }
                    </a>
                </address>
            </section>

            <p className="mt-10 text-xs text-neutral-500">
                TODO: This policy is provided for informational purposes and is not legal advice. For specific compliance requirements, please consult your legal counsel.
            </p>
        </div>
    </main>
</body>
</html>
