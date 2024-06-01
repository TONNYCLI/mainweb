@include('nav')
@if(session('success'))
<div class="alert">
    {{ session('success') }}
    <button type="button" class="close" backgroung="green" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="false">&times;</span>
    </button>
</div>
@endif

@include('header')

<section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 title">
          <h2>Contact Us</h2>
          <hr>
          <p>"Ready to embark on your photographic journey with AleeSnapshots? Reach out to us today to book your session or inquire about our services.</p>
        </div>
        <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 contact-form wow fadeInUp" data-wow-delay="0.9s">
          <form action="{{ route('contact.store') }}"  method="POST">
            @csrf
            <input type="text" class="form-control" placeholder="Name" name='name' required>
            <input type="number" class="form-control" placeholder="phone number" name='phone'  required>
            <textarea class="form-control" placeholder="Message" rows="6" name='message'  required></textarea>
            <input type="submit" class="form-control" value="message" >
          </form>
        </div>
      </div>
    </div>
  </section>

@include('footer')
