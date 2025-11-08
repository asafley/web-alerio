<!-- FAQ Partial View -->
<!-- Get FAQ Items and if none exist, do not render the section -->
@if(App\Models\Question::count() > 0)
    <section id="services" class="py-5 bg-light">
        <div class="container">
            <h2 class="display-5 fw-bold text-center mb-5">
                FAQ
            </h2>

            <!-- Get FAQ Items Question::all() and create a collapsible list -->
            <div class="accordion" id="faqAccordion">
                @foreach(App\Models\Question::all() as $index => $question)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $index }}">
                            <button class="accordion-button {{ $index != 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                {{ $question->question }}
                            </button>
                        </h2>
                        <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {!! nl2br(e($question->answer)) !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
<!-- End of FAQ Partial View -->
