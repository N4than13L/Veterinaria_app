<section class="visually-hidden">
    {{ $user = Auth::user() }}
    {{ $veterinaria = 'Veterinaria Los Codornices' }}
</section>


@extends('layouts.app')

@section('content')
    <div id="carouselExampleIndicators" class="carousel slide mt-4" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://cdn.pixabay.com/photo/2013/02/25/04/37/veterinary-85925_1280.jpg" class="d-block w-100"
                    alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://cdn.pixabay.com/photo/2016/01/30/12/16/kitten-1169507_1280.jpg" class="d-block w-100"
                    alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://cdn.pixabay.com/photo/2019/07/08/03/45/surgery-4323718_1280.jpg" class="d-block w-100"
                    alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="card mt-2">
                <h1 class="text-center">{{ $veterinaria }}</h1>
                <p class="m-3 mt-3">En la {{ $veterinaria }}, estamos comprometidos con el cuidado y bienestar de sus
                    queridas
                    mascotas. Somos un equipo de profesionales apasionados por los animales y dedicados a brindar atención
                    médica de alta calidad,
                    Nuestro equipo de veterinarios y personal de apoyo está altamente capacitado y comprometido con la
                    tención personalizada de su mascota. Entendemos que cada animal es único, y tratamos a cada paciente con
                    el respeto y cariño que se merece.
                </p>


                <h1 class="text-center">Instalaciones de Primera Clase</h1>
                <img class="img-fluid" src="https://cdn.pixabay.com/photo/2017/05/29/00/57/microscope-2352651_1280.jpg" />

                <p>Contamos con instalaciones modernas y equipamiento de vanguardia para garantizar la comodidad y
                    seguridad de su mascota durante su visita. Nuestra clínica está diseñada pensando en la tranquilidad
                    tanto de las mascotas como de sus dueños.
                </p>

                <h1 class="text-center"> Cuidado Preventivo:</h1>
                <p>
                    En {{ $veterinaria }}, su mascota es parte de nuestra familia. Confíenos su cuidado y estará en
                    las mejores manos. <strong>¡Esperamos conocerlos pronto y cuidar de su amado compañero peludo!</strong>
                    Creemos en la
                    importancia de la atención preventiva. Trabajamos con usted para establecer planes de
                    salud personalizados que mantendrán a su mascota en óptimas condiciones a lo largo de su vida. </p>

                <p>
                    Registro Médico y Seguimiento de Vacunas

                    En {{ $veterinaria }}, comprendemos la importancia de mantener un registro médico completo y
                    actualizado para su mascota. Crear un historial médico sólido es esencial para garantizar su
                    salud a lo
                    largo del tiempo. Además, el seguimiento de las vacunas es fundamental para prevenir
                    enfermedades y
                    garantizar una vida larga y saludable para su compañero peludo.

                <h1 class="text-center">Registro Médico Personalizado:</h1>

                <img src="https://cdn.pixabay.com/photo/2020/03/17/13/57/veterinary-4940425_1280.jpg" />
                <p>
                    En {{ $veterinaria }}, nos tomamos en serio el cuidado de su mascota y estamos aquí para
                    ayudarle a mantenerla feliz y saludable durante toda su vida. Contáctenos para programar una cita o
                    para
                    obtener más información sobre nuestros servicios de registro médico y seguimiento de vacunas.

                    Cada paciente en nuestra clínica tiene su propio registro médico personalizado. Esto incluye
                    información
                    vital sobre la salud de su mascota.
                </p>

                </p>
            </div>
        </div>
    </div>
@endsection
