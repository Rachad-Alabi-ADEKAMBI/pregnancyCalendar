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
    echo "
    <div class='app' id='app'>
    <div class='content'>
        <div class='main'>
            <div class='main__text'>
                <h1 class='title'>
                    Calendrier de grossesse
                </h1>
                <p class='text text-left'>
                    Toutes les dates importantes de votre grossesse
                </p>

                <div class='proceed '>

                    <div class='form'>
                        <label for=''>Date des dernières règles:
                            <input type='date' class='date' v-model='lastPeriodDate'>
                        </label>
                        <hr>

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
                        Calcul terme grossesse <span><a href='#calendar'><i class='fas fa-question'></i></a></span>
                    </h2>
                    <p class='text text-justify'>
                        Vous êtes enceinte de: <span> {{  convertir(durationInDays)  }} </span> <br>
                        bravo, vous avez fait: <span> {{ format((durationInDays *100)/280 ) }} % du chemin</span>
                        <br>
                        Date de conception: <span>{{ formatDate(conceptionDate) }}</span> <br>
                        Date d'accouchement : <span>{{  formatDate(dueDate)  }}</span> <br>
                        Durée d'aménorrhées: <span>{{ convertir(AndurationInDays) }} </span> <br>
                        Date limite pour déclarer votre grossesse: <span>{{ formatDate(dateOfAnnounement) }}</span>
                    </p>
                </div>

                <div class='results' v-if='showOvulation'>
                    <h2 class='subtitle'>
                        Calcul ovulation <span><a href='#ovulation'><i class='fas fa-question'></i></a></span>
                    </h2>
                    <p class='text text-justify'>
                    <p class='text text-justify'>
                        Vous êtes féconde entre le <span> {{  fecondDateA  }} </span> et le
                        <span>{{ fecondDateB }}</span> <br>
                    </p>
                    </p>
                </div>

                <div class='results' v-if='showEchography'>
                    <h2 class='subtitle'>
                        Dates d'échographie <span><a href='#echography'><i class='fas fa-question'></i></a></span>
                    </h2>

                    <p class='text text-justify'>
                        <strong>Echographie précoce:</strong> entre le <span>{{ formatDate(dateEco0A) }} </span> et
                        le
                        <span> {{ formatDate(dateEco0B) }}
                        </span>
                        <br>

                        <strong>1ère échographie recommandée:</strong>
                        entre le <span>{{ formatDate(dateEco1A) }}</span> et le
                        <span>{{ formatDate(dateEco1B)}}</span> <br>

                        <strong>2ème échographie recommandée:</strong>
                        entre le <span>{{ formatDate(dateEco2A ) }}</span> et le
                        <span>{{ formatDate(dateEco2B) }}</span> <br>

                        <strong>3ème échographie:</strong>
                        entre le <span>{{ formatDate(dateEco3A) }}</span> et le
                        <span>{{ formatDate(dateEco3B) }}</span>
                    </p>
                </div>


                <div class='results' v-if='showAppointments'>
                    <h2 class='subtitle'>
                        Consultations <span><a href='#appointments'><i class='fas fa-question'></i></a></span>
                    </h2>

                    <p class='text text-justify'>
                        <strong> 4ème mois de grossesse:</strong> entre le <span>{{ formatDate(dateCons4A) }}</span>
                        et le
                        <span>{{ formatDate(dateCons4B) }} </span> <br>

                        <strong>5ème mois de grossesse:</strong> entre le <span>{{ formatDate(dateCons5A) }}</span>
                        et le
                        <span>{{ formatDate(dateCons5B) }} </span> <br>

                        <strong>6ème mois de grossesse:</strong> entre le <span>{{ formatDate(dateCons6A) }}</span>
                        et le
                        <span>{{ formatDate(dateCons6B) }} </span> <br>

                        <strong>7ème mois de grossesse:</strong> entre le <span>{{ formatDate(dateCons7A) }}</span>
                        et le
                        <span>{{ formatDate(dateCons7B) }} </span> <br>

                        <strong> 8ème mois de grossesse:</strong> entre le <span>{{ formatDate(dateCons8A) }}</span>
                        et le
                        <span>{{ formatDate(dateCons8B) }} </span> <br>

                        <strong> 9ème mois de grossesse:</strong> entre le <span>{{ formatDate(dateCons9A) }}</span>
                        et le
                        <span>{{ formatDate(dateCons9B) }} </span>
                    </p>
                </div>

                <div class='results' v-if='showVacancies'>
                    <h2 class='subtitle'>
                        Congés <span><a href='#vacancies'><i class='fas fa-question'></i></a></span>
                    </h2>
                    <p class='text text-justify'>
                        <label for=''>
                            Nombre d'enfant(s) déjà né(s) : <select name='' id='' v-model='kids'
                                style='height: 28px'>
                                <option value='0'>0</option>
                                <option value='1'>1</option>
                                <option value='2'>2</option>
                            </select>
                        </label> <br>

                        <label for=''>
                            Vous êtes enceinte de <select name='' id='' v-model='kidsComing' style='height: 28px'>
                                <option value='jumeaux'>Jumeaux</option>
                                <option value='triples'>Triplés ou plus</option>
                            </select>
                        </label>

                        <button class='btn btn-primary ml-5' @click='proceedVac()'
                            style='background-color: #f0c7c2'>
                            Calculer
                        </button>
                    </p>

                    <p class='text text-justify' v-if='resultsVac != null'>
                        <strong>Début de votre congé maternité: </strong> <span>{{ formatDate(dateVacA) }}</span>
                        <br>
                        <strong>Fin de votre congé maternité: </strong> <span>{{ formatDate(dateVacB) }}</span> <br>
                        <strong>Date de pris en charge l'assurance maladie:</strong>
                        <span>{{ formatDate(dateCare) }}</span> <br>
                    </p>

                </div>


                <div class='results' v-if='showMore'>
                    <h2 class='subtitle'>
                        Plus <span><a href='#more'><i class='fas fa-question'></i></a></span>
                    </h2>
                    <p class='text text-justify'>
                        <strong>Votre bébé n'est plus prématuré à partir du:</strong>
                        <span>{{ formatDate(prematureDate) }}</span>
                        <br>
                        <strong> Date limite pour effectuer le test de trisomie 21:</strong> entre le
                        <span>{{ formatDate(dateTriso1) }}
                        </span>
                        et le
                        <span>{{ formatDate(dateTriso2) }}</span> <br>
                        <strong>Consultation avec l'anesthésiste:</strong>
                        à partir du
                        <span>{{ formatDate(anesthDate) }}</span> <br>
                        <strong>Prélèvement vaginal</strong>: à éffectuer entre le
                        <span>{{ formatDate(dateVagA) }}</span> et
                        le
                        <span>{{ formatDate(dateVagB) }}</span> <br>
                    </p>
                </div>


                <div v-if='showButtons' class='buttons'>
                    <label>
                        <input type='radio' name='menu-option' value='terme-grossesse' @click='proceed()'>
                        Terme grossesse
                    </label>

                    <label>
                        <input type='radio' name='menu-option' value='echographie' @click='displayEchography()'>
                        Echographie
                    </label>

                    <label>
                        <input type='radio' name='menu-option' value='consultations' @click='displayAppointments()'>
                        Consultations
                    </label>

                    <label>
                        <input type='radio' name='menu-option' value='conges-maternite' @click='displayVacancies()'>
                        Congés maternité
                    </label>

                    <label>
                        <input type='radio' name='menu-option' value='calendrier' @click='displayOvulation()'>
                        Calcul ovulation
                    </label>

                    <label>
                        <input type='radio' name='menu-option' value='plus' @click='displayMore()'>
                        Plus
                    </label>
                </div>

            </div>

        </div>

        <div class='item' id='calendar'>
            <h2>
                calendrier de grossesse:
            </h2>

            <button class='btn btn-primary' @click='displayCalendar()'>
                Afficher le calendrier
            </button>

            <p class='text text-justify' v-if='results != null'>
                Vous êtes enceinte de: <span> {{  convertir(durationInDays)  }} </span> <br>
                Bravo, vous avez fait: <span> {{ format((durationInDays *100)/316 ) }} % du chemin</span>
                <br>
                Date de conception: <span>{{ conceptionDate }}</span> <br>
                Durée d'aménorrhées: <span>{{ Anduration }} </span> <br>
                Date limite pour déclarer votre grossesse: <span>{{ dateOfAnnounement}}</span>
            </p>

            <p class='text'>
                Le calendrier de grossesse d'une femme est un outil utile pour suivre les différentes étapes de la
                grossesse et s'assurer que tout se passe bien pour la mère et le bébé. Il commence généralement à la
                date prévue de la dernière période menstruelle et se poursuit jusqu'à la naissance du bébé, soit
                environ 40 semaines plus tard.
            </p>
        </div>
        <hr>

        <div class='item' id='dueDate'>
            <h2>
                calcul date d'accouchement
            </h2>

            <p class='text text-justify' v-if='results != null'>
                Date d'accouchement : <span>{{dueDate}}</span> <br>
            </p>

            <p class='text text-justify'>
                La plupart des personnes ne connaissent pas la date exacte de conception, c'est pourquoi le terme
                est de 280 jours à compter du premier jour des dernières règles. Si vous connaissez votre date
                de conception, la date d'accouchement peut être calculée en lui ajoutant 266 jours. Il est
                important de se préparer à l'arrivée
                du bébé en ayant un plan de naissance et un sac de maternité prêts.
            </p>
        </div>
        <hr>

        <div class='item' id='echography'>
            <h2>
                Calcul dates des échographies
            </h2>

            <p class='text text-justify' v-if='results != null'>
                Echographie précoce: entre le <span>{{ dateEco0A }} </span> et le <span> {{ dateEco0B }} </span>
                <br>

                1ère échographie recommandée:
                : entre le <span>{{ dateEco1A}}</span> et le <span>{{ dateEco1B}}</span> <br>

                2ème échographie recommandée:
                : entre le <span>{{ dateEco2A }}</span> et le <span>{{ dateEco2B }}</span> <br>

                3ème échographie:
                : entre le <span>{{ dateEco3A }}</span> et le <span>{{ dateEco3B }}</span>
            </p>

            <p class='text text-justify'>
                <strong>L'échographie</strong> doit être réalisée entre 8 S.A. et 9S.A. <br>
                <strong>La première échographie</strong> doit être réalisée entre 11 S.A. et 13 S.A.+6. <br>
                <strong>La deuxième échographie</strong> est réalisée entre 22S.A. et 24S.A. <br>
                <strong>La troisième échographie</strong> est réalisée entre 32S.A. et 34S.A.. <br>
                Les échographies sont cruciales pour évaluer la croissance et la santé du fœtus. Elles permettent de
                vérifier la vitalité du fœtus, son âge gestationnel, la position de placenta, la quantité de liquide
                amniotique et les malformations. Les échographies peuvent être recommandées à différents moments de
                la grossesse en fonction des besoins individuels de chaque femme enceinte et de son fœtus. Elles
                sont généralement sans danger pour la mère et le fœtus.
            </p>
        </div>
        <hr>

        <div class='item' id='appointments'>
            <h2>
                Consultations
            </h2>

            <p class='text text-justify' v-if='results != null'>
                4ème mois de grossesse
                : entre le <span>25/02/2023 et le 27/03/2023</span> <br>

                5ème mois de grossesse
                : entre le <span> 28/03/2023 et le 28/04/2023</span> <br>

                6ème mois de grossesse
                : entre le <span>29/04/2023 et le 29/05/2023</span> <br>

                7ème mois de grossesse
                : entre le <span>30/05/2023 et le 26/06/2023</span> <br>

                8ème mois de grossesse
                : entre le <span>27/06/2023 et le 26/07/2023</span> <br>

                9ème mois de grossesse
                : entre le <span>27/07/2023 et le 25/08/2023</span> <br>
            </p>

            <p class='text text-justify'>
                Le calcul des dates pendant la grossesse permet de déterminer la date d'accouchement et de suivre le
                développement du bébé. Les consultations prénatales sont essentielles pour surveiller la santé de la
                mère et du bébé, détecter d'éventuels problèmes et fournir des informations et un soutien émotionnel
                et psychologique.
            </p>
        </div>
        <hr>

        <div class='item' id='vacancies'>
            <h2>
                Congés maternité
            </h2>

            <p class='text text-justify' v-if='results != null'>
                <label for=''>
                    Nombre d'enfant(s) déjà né(s) : <select name='' id='' v-model='kids' style='height: 28px'>
                        <option value='0'>0</option>
                        <option value='1'>1</option>
                        <option value='2'>2</option>
                    </select>
                </label> <br>

                <label for=''>
                    Vous êtes enceinte de <select name='' id='' v-model='kidsComing' style='height: 28px'>
                        <option value='jumeaux'>Jumeaux</option>
                        <option value='triples'>Triplés ou plus</option>
                    </select>
                </label>

                <button class='btn btn-primary' @click='proceedVac()'
                    style='color: #f0c7c2; margin-left: 10px; background-color: #393F82'>
                    Calculer
                </button>
            </p>
            <br>

            <p class='text text-justify' v-if='resultsVac != null'>
                Date limite pour déclarer votre grossesse: <span>{{ dateOfAnnounement}}</span> <br>

                Date de début de votre congé maternité : <span>{{ dateVacA}}</span> <br>
                Date de fin de votre congé maternité : <span>{{ dateVacB}}</span> <br>
                Vous serez pris en charge à 100% par l'assurance maladie à partir du :
                <span>{{ dateCare }}</span> <br>
            </p>


            <p class='text text-justify'>Pour bénéficier de tous vos droits, vous devez envoyer votre déclaration de
                grossesse
                dans les 14 premières semaines ou avant la fin du 3e mois.
                Le congé maternité est un temps de repos accordé à la mère après l'accouchement pour récupérer et
                prendre soin de son nouveau-né. Le calcul de la durée du congé maternité dépend en général, la durée
                du
                congé maternité est calculée à partir de la date prévue d'accouchement. Il offre également un temps
                précieux pour créer des liens avec le nouveau-né, allaiter et prendre soin de lui. Le congé
                maternité peut également aider à réduire le risque de complications de santé et à favoriser la
                récupération et le bien-être de la mère et du bébé.
            </p>
        </div>
        <hr>

        <div class='item' id='ovulation'>
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
        <hr>

        <div class='item' id='more'>
            <h2>
                Plus
            </h2>

            <p class='text text-justify' v-if='results != null'>
                Votre bébé n'est plus prématuré à partir du: <span>{{ formatDate(prematureDate) }}</span> <br>
                Date limite pour effectuer le test de trisomie 21: entre le <span>{{ formatDate(dateTriso1) }}
                </span>
                et le
                <span>{{ formatDate(dateTriso2) }}</span> <br>
                La consultation avec l'anesthésiste est à effectuer à partir du
                <span>{{ formatDate(anesthDate) }}</span> <br>
                Le prélèvement vaginal est à éffectuer entre le <span>{{ formatDate(dateVagA) }}</span> et le
                <span>{{ formatDate(dateVagB) }}</span> <br>
            </p>

            <p class='text text-justify'>
            <ul>
                <li>
                    <strong>Le test de trisomie21</strong> est réalisé en début de grossesse entre la 11ème et la
                    14ème semaine
                    d'aménorrhée Il
                    comprend une prise de sang et une échographie afin d'évaluer le risque de trisomie 21 mais aussi
                    de
                    trisomie 18 et un éventuel défaut de fermeture du tube neural.
                </li>

                <li>
                    C'est au cours du 8e mois que votre <strong>rendez-vous avec l'anesthésiste</strong> est
                    préconisé. En cas de
                    grossesse difficile ou de naissance multiple, le rendez-vous est avancé au 6e ou 7e mois.
                    Parfois, vous pouvez y aller au tout début du 9e mois.
                </li>

                <li>
                    En général, votre professionnel de la santé procédera à un <strong>examen vaginal</strong>
                    seulement au cours des visites près de votre date prévue d'accouchement.
                </li>
            </ul>

            </p>
        </div>
        <hr>
    </div>

    <div class='content' v-if='showCalendar'>
        <div class='close' @click='closeCalendar'>X</div>
        Calendar
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