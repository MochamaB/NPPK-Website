<!-- Contact Form Widget -->
<section class="contact-area ptb-80">
    <div class="container">
        @if(isset($title) || isset($description))
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title">
                    @if(isset($title))
                        <h2>{{ $title }}</h2>
                    @endif
                    @if(isset($description))
                        <p>{{ $description }}</p>
                    @endif
                </div>
            </div>
        </div>
        @endif
        
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="contact-form">
                    <form id="contact-form" action="{{ $form_action ?? route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input name="name" type="text" placeholder="Your Name *" required>
                            </div>
                            <div class="col-md-6">
                                <input name="email" type="email" placeholder="Your Email *" required>
                            </div>
                            <div class="col-md-12">
                                <input name="subject" type="text" placeholder="Subject *" required>
                            </div>
                            <div class="col-md-12">
                                <textarea name="message" placeholder="Your Message *" required></textarea>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="button lg-btn">{{ $submit_text ?? 'Send Message' }}</button>
                            </div>
                        </div>
                        @if(isset($success_message))
                            <div class="alert alert-success d-none" id="successMessage">{{ $success_message }}</div>
                        @endif
                        @if(isset($error_message))
                            <div class="alert alert-danger d-none" id="errorMessage">{{ $error_message }}</div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
