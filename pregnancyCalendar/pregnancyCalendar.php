<?php
/*
 * Plugin Name:       pregnancyCalendar
 * Description:       Calendrier de grossesse
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Codeur créatif
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       pregnancyCalendar
 * Domain Path:       /languages
 */

function displayApp()
{
    $logo =
        'https://www.calendriers-grossesse.com/wp-content/uploads/2023/03/cropped-logo-rm.png';

    echo "
        <div class='app' id='app'>
                <nav class='navbar navbar-expand-lg navbar-light bg-light mt-0'>
                    <a class='navbar-brand' href='#'>
                        <img src='$logo' alt='calendrier de grossesse en ligne'
width='100' height='60'>
</a>
<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent'
    aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
</button>


<div class='collapse navbar-collapse' id='navbarSupportedContent'>
    <ul class='navbar-nav mx-auto'>
        <li class='nav-item active'>
            <a class='nav-link' href='#'>Calendrier grossesse<span class='sr-only'>(current)</span></a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='#offer'>Calcul terme grosesse</a>
        </li>

        <li class='nav-item'>
            <a class='nav-link disabled' href='about'>Calcul ovulation</a>
        </li>
        <li class='nav-item'>
            <a class='nav-link disabled' href='#'>Grossesse semaine par semaine</a>
        </li>

    </ul>
</div>
</nav>



<div class='content'>
            <div class='main'>
                <div class='main__text'>
                    <h1 class='title'>
                        Calendrier de grossesse
                    </h1>
                    <p class='text text-left'>
                        bienvenue sur le calendrier,
                    </p>

                    <div class='proceed '>

                        <div class='form'>
                            <label for=''>Date des dernières règles:
                                <input type='date' class='date' v-model='lastPeriodDate'>
                            </label>

                            <label for=''></label>Date de conception:
                            <input type='date' class='date' v-model='conceptionDate'>
                            </label>
                        </div>

                        <button @click='proceed()' class='btn btn-primary'>
                            Calculer
                        </button>

                    </div>

                    <div class='results' v-if='showResults'>
                        <h2 class='subtitle'>
                            Calcul terme grossesses
                        </h2>
                        <p class='text text-justify'>
                            Vous êtes enceinte de: <span> {{  convertir(durationInDays)  }} </span> <br>
                            bravo, vous avez fait: <span> {{ format((durationInDays *100)/316 ) }} % du chemin</span>
                            <br>
                            Date estimable d'accouchement : <span>{{dueDate}}</span> <br>
                            Durée d'aménorrhées: <span>{{ Anduration }} </span> <br>
                            Date limite pour déclarer votre grossesse: <span>{{ dateOfAnnounement}}</span> <br>
                            Date limite pour effectuer le test de trisomie 21: <span>entre le 01/03/2023 et le
                                15/04/2023</span>
                        </p>
                    </div>

                    <div class='results' v-if='showCalendar'>
                        <h2 class='subtitle'>
                            Calendrier semaine par semaines
                        </h2>
                        <p class='text text-justify'>
                            Calendar
                        </p>
                    </div>

                    <div class='results' v-if='showEchography'>
                        <h2 class='subtitle'>
                            Dates d'échographie
                        </h2>

                        <p class='text text-justify'>
                            Echographie précoce autour de <span>7 SA</span>
                            A effectuer entre le <span>17/12/2022 </span> et le <span>13/01/2023</span> <br>

                            1ère échographie recommandée autour de <span>12 SA</span>
                            A effectuer entre le <span>21/01/2023</span> et le <span>17/02/2023</span> <br>

                            2ème échographie recommandée autour de <span>22 SA</span>
                            A effectuer entre le <span>25/03/2023</span> et le <span>05/05/2023</span> <br>

                            3ème échographie recommandée autour de <span>32 SA</span>
                            A effectuer entre le <span>03/06/2023</span> et le <span>14/07/2023</span>
                        </p>
                    </div>


                    <div class='results' v-if='showAppointments'>
                        <p class='text text-justify'>
                            Consultations
                        </p>
                    </div>

                    <div class='results' v-if='showVacancies'>
                        <h2 class='subtitle'>
                            Congés
                        </h2>
                        <p class='text text-justify'>
                            <label for=''>>
                                Nombre d'enfant(s) déjà né(s) : <select name=' id='>
                                    <option value='1'>1</option>
                                    <option value='2'>2</option>
                                    <option value='3'>3</option>
                                    <option value='4'>4</option>
                                    <option value='5'>5</option>
                                    <option value='6'>6</option>
                                </select>
                            </label> <br>

                            <label for=''>
                                Vous êtes enceinte de <select name=' id='>
                                    <option value='unique'>1 enfant</option>
                                    <option value='jumeaux'>Jumeaux</option>
                                    <option value='triples'>Triplés ou plus</option>
                                </select>
                            </label> <br>


                            Date de début de votre congé maternité : <span>14/07/2023</span> <br>

                            Date de fin de votre congé maternité : <span>02/11/2023</span> <br>
                            Vous serez pris en charge à 100% par l'assurance maladie à partir du :
                            <span>27/04/2023</span> <br>
                        </p>
                    </div>


                    <div class='results' v-if='showMore'>
                        <h2 class='subtitle'>
                            Plus
                        </h2>
                        <p class='text text-justify'>
                            A partir du <span> 22/07/2023</span> votre bébé n'est plus prématuré. <br>
                            La consultation avec l'anesthésiste est à effectuer à partir du <span>25/07/2023</span> <br>
                            Le prélèvement vaginal est à éffectuer entre le <span>08/07/2023</span> et le
                            <span>04/08/2023</span>
                        </p>
                    </div>


                    <div class='buttons' v-if='showButtons'>
                        <button class='btn btn-primary' @click='proceed()'>
                            Terme grossesse
                        </button>

                        <button class='btn btn-primary' @click='displayEchography()'>
                            Echographie
                        </button>

                        <button class='btn btn-primary' @click='displayAppointments()'>
                            Consultations
                        </button>


                        <button class='btn btn-primary' @click='displayVacancies()'>
                            Congés maternité
                        </button>

                        <button class='btn btn-primary' @click='displayCalendar()'>
                            Calendrier
                        </button>

                        <button class='btn btn-primary' @click='displayMore()'>
                            Plus
                        </button>
                    </div>
                </div>

            </div>

            <div class='item'>
                <h2>
                    calendrier de grossesse:
                </h2>

                <p class='text text-justify' v-if='results == null'>
                    vous êtes dans le <span>
                        {{ durationInMonthsFormated }}{{ durationInMonthsFormated === 1 ? 'er' : 'ème' }} mois </span>
                    <br>
                    bravo, vous avez fait: <span> {{ ((durationInDays *100)/270 ) }} % du chemin</span> <br>
                    Date limite pour déclarer votre grossesse: <span>{{ datOfAnnouncement}}</span> <br>
                    Date limite pour effectuer le test de trisomie 21: entre le<span> {{dateTriso1}}</span> et le
                    <span>/04/2023</span>
                </p>

                <p class='text'>
                    Le calendrier de grossesse d'une femme est un outil utile pour suivre les différentes étapes de la
                    grossesse et s'assurer que tout se passe bien pour la mère et le bébé. Il commence généralement à la
                    date prévue de la dernière période menstruelle et se poursuit jusqu'à la naissance du bébé, soit
                    environ 40 semaines plus tard.
                </p>
            </div>
            <hr>

            <div class='item'>
                <h2>
                    calcul date d'accouchement
                </h2>

                <p class='text'>
                    Date estimable d'accouchement : <span>{{dueDate}}</span> <br>
                </p>

                <p class='text text-justify' v-if='results == null'>
                    Le calcul de la date d'accouchement d'une femme enceinte est basé sur la date prévue de sa dernière
                    période menstruelle. Cela consiste à ajouter 280 jours à la date du premier jour de sa dernière
                    période menstruelle. La date d'accouchement est une estimation et le bébé peut arriver à tout moment
                    dans les deux semaines précédant ou suivant cette date. Il est important de se préparer à l'arrivée
                    du bébé en ayant un plan de naissance et un sac de maternité prêts.
                </p>
            </div>
            <hr>

            <div class='item'>
                <h2>
                    Calcul dates des échographies
                </h2>

                <p class='text text-justify' v-if='results == null'>


                    Echographie précoce autour de 7 SA
                    A effectuer entre <span>le 17/12/2022 et le 13/01/2023
                    </span> <br>
                    1ère échographie recommandée autour de 12 SA
                    A effectuer entre le <span>21/01/2023 et le 17/02/2023</span> <br>

                    2ème échographie recommandée autour de 22 SA
                    A effectuer entre le <span>25/03/2023 et le 05/05/2023
                    </span> <br>
                    3ème échographie recommandée autour de 32 SA
                    A effectuer entre le <span>03/06/2023 et le 14/07/2023
                    </span>
                </p>

                <p class='text'>
                    Les échographies sont cruciales pour évaluer la croissance et la santé du fœtus. Elles permettent de
                    vérifier la vitalité du fœtus, son âge gestationnel, la position de placenta, la quantité de liquide
                    amniotique et les malformations. Les échographies peuvent être recommandées à différents moments de
                    la grossesse en fonction des besoins individuels de chaque femme enceinte et de son fœtus. Elles
                    sont généralement sans danger pour la mère et le fœtus.
                </p>
            </div>
            <hr>

            <div class='item'>
                <h2>
                    Consultations
                </h2>

                <p class='text text-justify' v-if='results == null'>
                    Consultation du 4ème mois de grossesse
                    A effectuer entre le <span>25/02/2023 et le 27/03/2023</span> <br>

                    Consultation du 5ème mois de grossesse
                    A effectuer entre le <span> 28/03/2023 et le 28/04/2023</span> <br>

                    Consultation du 6ème mois de grossesse
                    A effectuer entre le <span>29/04/2023 et le 29/05/2023</span> <br>

                    Consultation du 7ème mois de grossesse
                    A effectuer entre le <span>30/05/2023 et le 26/06/2023</span> <br>

                    Consultation du 8ème mois de grossesse
                    A effectuer entre le <span>27/06/2023 et le 26/07/2023</span> <br>

                    Consultation du 9ème mois de grossesse
                    A effectuer entre le <span>27/07/2023 et le 25/08/2023</span> <br>
                </p>

                <p class='text'>
                    Le calcul des dates pendant la grossesse permet de déterminer la date d'accouchement et de suivre le
                    développement du bébé. Les consultations prénatales sont essentielles pour surveiller la santé de la
                    mère et du bébé, détecter d'éventuels problèmes et fournir des informations et un soutien émotionnel
                    et psychologique.
                </p>
            </div>
            <hr>

            <div class='item'>
                <h2>
                    Congés maternité
                </h2>

                <p class='text text-justify' v-if='results == null'>
                    <label for=''>
                        Nombre d'enfant(s) déjà né(s) : <select name=' id='>
                            <option value='1'>1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                            <option value='5'>5</option>
                            <option value='6'>6</option>
                        </select>
                    </label> <br>

                    <label for=''>
                        Vous êtes enceinte de <select name=' id='>
                            <option value='jumeaux'>Jumeaux</option>
                            <option value='triples'>Triplés ou plus</option>
                        </select>
                    </label> <br>


                    Date de début de votre congé maternité : <span>14/07/2023</span> <br>

                    Date de fin de votre congé maternité : <span>02/11/2023</span> <br>
                    Vous serez pris en charge à 100% par l'assurance maladie à partir du :
                    <span>27/04/2023</span> <br>
                </p>

                <p class='text'>
                    Le congé maternité est un temps de repos accordé à la mère après l'accouchement pour récupérer et
                    prendre soin de son nouveau-né. Le calcul de la durée du congé maternité dépend de nombreux facteurs
                    tels que le pays, l'employeur et la santé de la mère et du bébé. Cependant, en général, la durée du
                    congé maternité est calculée à partir de la date prévue d'accouchement.

                    Le congé maternité est important car il permet à la mère de se rétablir physiquement et
                    émotionnellement après l'accouchement, ainsi que de s'adapter à son nouveau rôle de parent. Il offre
                    également un temps précieux pour créer des liens avec le nouveau-né, allaiter et prendre soin de
                    lui. Le congé maternité peut également aider à réduire le risque de complications de santé et à
                    favoriser la récupération et le bien-être de la mère et du bébé.

                </p>
            </div>
            <hr>

            <div class='item'>
                <h2>
                    Plus
                </h2>

                <p class='text'>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, atque delectus enim impedit
                    consectetur commodi sint. Illum doloremque, consectetur delectus, magni cumque dolorum laudantium
                    dignissimos ex architecto exercitationem, soluta distinctio.
                </p>
            </div>
            <hr>

            <div class='item'>
                <h2>
                    calcul date d'ovulation
                </h2>

                <p class='text'>
                    La date d'ovulation est la période de fertilité maximale chez la femme et détermine la période la
                    plus propice pour concevoir un enfant. En général, l'ovulation se produit environ 14 jours avant le
                    début des prochaines règles. Cependant, cela peut varier en fonction de la durée du cycle menstruel
                    de chaque femme. Par exemple, pour un cycle menstruel de 28 jours, l'ovulation se produirait
                    généralement autour du 14ème jour, tandis que pour un cycle de 32 jours, l'ovulation serait prévue
                    autour du 18ème jour.

                    Il existe plusieurs méthodes pour déterminer la date d'ovulation, notamment en surveillant la
                    température corporelle basale, en utilisant des tests d'ovulation ou en surveillant les changements
                    dans la glaire cervicale. Il est important de comprendre les signes de l'ovulation pour planifier
                    une grossesse ou pour éviter une grossesse non désirée. Cependant, il est important de noter que ces
                    méthodes ne sont pas toujours précises et ne garantissent pas une conception réussie.
                </p>
            </div>
</div>

</div>
";
    wp_enqueue_script(
        'vue',
        esc_url('https://unpkg.com/vue@3/dist/vue.global.js'),
        [],
        null,
        true
    );
    wp_enqueue_script(
        'app',
        esc_url(plugin_dir_url(__FILE__) . 'public/js/app.js'),
        ['vue'],
        null,
        true
    );
    wp_enqueue_style(
        'bootstrap',
        esc_url(
            'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css'
        ),
        [],
        null
    );
    wp_enqueue_style(
        'app',
        esc_url(plugin_dir_url(__FILE__) . 'public/css/style.css'),
        ['bootstrap'],
        null
    );
    wp_enqueue_script(
        'jquery',
        'https://code.jquery.com/jquery-3.3.1.slim.min.js',
        [],
        null,
        true
    );
    wp_enqueue_script(
        'popper',
        'https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js',
        ['jquery'],
        null,
        true
    );
    wp_enqueue_script(
        'bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js',
        ['jquery', 'popper'],
        null,
        true
    );
}

add_shortcode('pregnancyCalendar', 'displayApp');
//add_action('wp_enqueue_scripts', 'displaySolidaire');b