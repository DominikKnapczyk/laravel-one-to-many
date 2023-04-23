@extends('layouts.guest')

@section('content')

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-4 text-center">
                            <img src="{{ asset('images/me1.jpg') }}" width="350" alt="Logo">
                        </div>
                        <div class="col-md-8 my-2">
                            <h2 class="font-weight-bold mb-4">Il mio portfolio</h2>
                            <p class="mb-2">Ciao! Sono Dominik, un Full Stack Web Developer Junior. Ho frequentato il corso di Boolean, che mi ha permesso di acquisire conoscenze approfondite in diverse tecnologie, tra cui:</p>
                            <ul class="mb-4">
                                <li>Frontend: HTML, CSS, JavaScript, Vue.js e Vite.js</li>
                                <li>Backend: PHP, SQL e Laravel</li>
                            </ul>
                            <p class="mb-0">Ho una grande passione per il web development e sono costantemente alla ricerca di nuove sfide e opportunità di crescita professionale. In questo portfolio, potrai trovare alcuni dei miei lavori e progetti.</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row justify-content-center my-3">
                        <div class="col-md-6 my-2">
                            <a href="https://github.com/dominikknapczyk" target="_blank" class="btn btn-primary btn-lg w-100">
                            <i class="bi bi-github me-2"></i>GitHub
                            </a>
                        </div>
                        <div class="col-md-6 my-2">
                            <a href="https://www.linkedin.com/in/MIO_LINKEDIN" target="_blank" class="btn btn-primary btn-lg w-100">
                            <i class="bi bi-linkedin me-2"></i>LinkedIn
                            </a>
                        </div>
                    </div>
                    <div class="row justify-content-center my-3">
                        <div class="col-md-13 my-2">
                            <a href="{{ route('guest.projects.index') }}" target="_blank" class="btn btn-success btn-lg w-100">
                                Guarda i miei progetti
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
