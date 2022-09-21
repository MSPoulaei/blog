@extends("layouts.layout")

@section("content")
<div class="section-title mb-0">
    <h4 class="m-0 text-uppercase font-weight-bold">Contact Us For Any Queries</h4>
</div>
<div class="bg-white border border-top-0 p-4 mb-3">
    <div class="mb-4">
        <h6 class="text-uppercase font-weight-bold">Contact Info</h6>
        <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
        <div class="mb-3">
            <div class="d-flex align-items-center mb-2">
                <i class="fa fa-map-marker-alt text-primary mr-2"></i>
                <h6 class="font-weight-bold mb-0">Our Office</h6>
            </div>
            <p class="m-0">123 Street, New York, USA</p>
        </div>
        <div class="mb-3">
            <div class="d-flex align-items-center mb-2">
                <i class="fa fa-envelope-open text-primary mr-2"></i>
                <h6 class="font-weight-bold mb-0">Email Us</h6>
            </div>
            <p class="m-0">info@example.com</p>
        </div>
        <div class="mb-3">
            <div class="d-flex align-items-center mb-2">
                <i class="fa fa-phone-alt text-primary mr-2"></i>
                <h6 class="font-weight-bold mb-0">Call Us</h6>
            </div>
            <p class="m-0">+012 345 6789</p>
        </div>
    </div>
    <h6 class="text-uppercase font-weight-bold mb-3">Contact Us</h6>
    <form>
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control p-4" placeholder="Your Name" required="required"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="email" class="form-control p-4" placeholder="Your Email" required="required"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <input type="text" class="form-control p-4" placeholder="Subject" required="required"/>
        </div>
        <div class="form-group">
            <textarea class="form-control" rows="4" placeholder="Message" required="required"></textarea>
        </div>
        <div>
            <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;"
                    type="submit">Send Message</button>
        </div>
    </form>
</div>
@endsection