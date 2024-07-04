@extends('layouts.main')

@section('container')
<div class="container my-5">
    <h1 class="text-center mb-5"><i class="bi bi-info-circle-fill"></i> About Us</h1>

    <!-- About the Blog -->
    <section class="mb-5">
        <h2>About the Blog</h2>
        <p>Welcome to our blog! Here, we share insightful articles on various topics including technology, lifestyle, travel, and more. Our mission is to provide valuable content that informs, inspires, and entertains our readers.</p>
    </section>

    <!-- Meet the Team -->
    <section class="mb-5">
        <h2>Meet the Team</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center">
                    <img src="https://via.placeholder.com/150" class="card-img-top rounded-circle mx-auto mt-4" alt="Team Member" style="width: 150px; height: 150px;">
                    <div class="card-body">
                        <h5 class="card-title">John Doe</h5>
                        <p class="card-text">Editor-in-Chief</p>
                        <p class="card-text">John is passionate about writing and has been in the industry for over 10 years. He oversees all content on our blog.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center">
                    <img src="https://via.placeholder.com/150" class="card-img-top rounded-circle mx-auto mt-4" alt="Team Member" style="width: 150px; height: 150px;">
                    <div class="card-body">
                        <h5 class="card-title">Jane Smith</h5>
                        <p class="card-text">Lead Writer</p>
                        <p class="card-text">Jane specializes in technology and lifestyle topics. She loves sharing her knowledge and experiences with our readers.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center">
                    <img src="https://via.placeholder.com/150" class="card-img-top rounded-circle mx-auto mt-4" alt="Team Member" style="width: 150px; height: 150px;">
                    <div class="card-body">
                        <h5 class="card-title">Emily Brown</h5>
                        <p class="card-text">Content Strategist</p>
                        <p class="card-text">Emily plans and manages our content calendar. She ensures that we deliver relevant and engaging content to our audience.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Mission -->
    <section class="mb-5">
        <h2>Our Mission</h2>
        <p>Our mission is to create a platform where readers can find useful information and be inspired by our stories. We believe in the power of words and aim to make a positive impact through our content.</p>
    </section>
</div>
@endsection
