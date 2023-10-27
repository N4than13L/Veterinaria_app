@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {{--    Sobre nosotros --}}
            <h1 class="text-center"> Bienvenidos a Veteriaria Los Codornices</h1>

            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
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
                        <img src="https://cdn.pixabay.com/photo/2013/02/25/04/37/veterinary-85925_1280.jpg"
                            class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://cdn.pixabay.com/photo/2016/01/30/12/16/kitten-1169507_1280.jpg"
                            class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://cdn.pixabay.com/photo/2019/07/08/03/45/surgery-4323718_1280.jpg"
                            class="d-block w-100" alt="...">
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

            <div class="card mt-2">
                <p>En la Veterinaria Los Codornices, estamos comprometidos con el cuidado y bienestar de sus queridas
                    mascotas. Somos un equipo de profesionales apasionados por los animales y dedicados a brindar atención
                    <li> médica de alta calidad.</li>
                    <li> Equipo Especializado:</li>
                    Nuestro equipo de veterinarios y personal de apoyo está altamente capacitado y comprometido con la
                    tención personalizada de su mascota. Entendemos que cada animal es único, y tratamos a cada paciente con
                    el respeto y cariño que se merece.
                </p>

                <p>
                <h1>Instalaciones de Primera Clase:</h1>
                <img class="img-fluid" src="https://cdn.pixabay.com/photo/2017/05/29/00/57/microscope-2352651_1280.jpg" />
                Contamos con instalaciones modernas y equipamiento de vanguardia para garantizar la comodidad y
                seguridad de su mascota durante su visita. Nuestra clínica está diseñada pensando en la tranquilidad
                tanto de las mascotas como de sus dueños.

                Cuidado Preventivo:
                Creemos en la importancia de la atención preventiva. Trabajamos con usted para establecer planes de
                salud personalizados que mantendrán a su mascota en óptimas condiciones a lo largo de su vida.
                </p>

                <p>
                    En Veteriaria Los Codornices, su mascota es parte de nuestra familia. Confíenos su cuidado y estará en
                    las mejores manos. ¡Esperamos conocerlos pronto y cuidar de su amado compañero peludo!
                </p>

                <p>
                    Registro Médico y Seguimiento de Vacunas

                    En [Nombre de la Veterinaria], comprendemos la importancia de mantener un registro médico completo y
                    actualizado para su mascota. Crear un historial médico sólido es esencial para garantizar su salud a lo
                    largo del tiempo. Además, el seguimiento de las vacunas es fundamental para prevenir enfermedades y
                    garantizar una vida larga y saludable para su compañero peludo.

                    Registro Médico Personalizado:
                    Cada paciente en nuestra clínica tiene su propio registro médico personalizado. Esto incluye información
                    vital sobre la salud de su mascota, incluyendo:

                    Historial de enfermedades y tratamientos
                    Fechas de vacunación y desparasitación
                    Resultados de exámenes diagnósticos
                    Notas de seguimiento
                    Recomendaciones de salud
                    Seguimiento de Vacunas:
                    Las vacunas son un componente esencial del cuidado preventivo. Nuestro equipo de veterinarios le ayudará
                    a establecer un calendario de vacunación adecuado para su mascota, asegurándonos de que esté protegida
                    contra enfermedades comunes. Además, enviaremos recordatorios de citas para asegurarnos de que sus
                    vacunas estén al día.

                    Acceso en Línea:
                    Para su comodidad, ofrecemos acceso en línea a los registros médicos y al historial de vacunas de su
                    mascota. Puede revisar esta información en cualquier momento y lugar, lo que le facilita el seguimiento
                    de la salud de su mascota.

                    Asesoramiento Personalizado:
                    Nuestro equipo estará encantado de responder a sus preguntas sobre el registro médico y el programa de
                    vacunación de su mascota. Estamos comprometidos en brindarle la mejor orientación y atención.

                    En [Nombre de la Veterinaria], nos tomamos en serio el cuidado de su mascota y estamos aquí para
                    ayudarle a mantenerla feliz y saludable durante toda su vida. Contáctenos para programar una cita o para
                    obtener más información sobre nuestros servicios de registro médico y seguimiento de vacunas.
                </p>
            </div>

        </div>
    </div>
@endsection
