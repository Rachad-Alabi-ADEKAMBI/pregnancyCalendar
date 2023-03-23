<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'parts/meta.php'; ?>
    <script src="https://kit.fontawesome.com/b14771b76e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <title>Calendrier de grossesse - Accueil</title>

</head>

<body>
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

                        <button @click='proceed()' class='btn btn-primary' style='background: #f0c7c2;
                        border: none; color: #393F82;'>
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
                            <label for=''>
                                Cycle : <select name='' id='' v-model='cycle' style='height: 28px'>
                                    <option value='24'>24</option>
                                    <option value='28'>28</option>
                                    <option value='36'>36</option>
                                </select>
                            </label> <br>


                            <button class='btn btn-primary ml-5' @click='proceedFert()'
                                style='background-color: #f0c7c2'>
                                Calculer
                            </button>
                        </p>


                        <p class='text text-justify' v-if='resultsFert != null'>
                            <strong>Période d'ovulation:</strong> entre le<span> {{  formatDate(fecondDateA)  }} </span>
                            et le
                            <span>{{  formatDate(fecondDateB) }}</span> <br>
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
                            <strong> Date limite pour déclarer votre grossesse:</strong>
                            <span>{{ dateOfAnnounement}}</span>
                            <br>

                            <strong>Date de début de votre congé maternité: </strong>
                            <span>{{ formatDate(dateVacA)}}</span>
                            <br>
                            <strong>Date de fin de votre congé maternité:</strong>
                            <span>{{ formatDate(dateVacB)}}</span> <br>
                            <strong>Vous serez pris en charge à 100% par l'assurance maladie à partir du:</strong>
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

                <button class='btn btn-primary' @click='proceedCalendar()' v-if='showButton' style='background-color: #393F82;
                color: #f0c7c2'>
                    Afficher le calendrier
                </button>

                <div class='calendar mb-3' v-if='showCalendar'>
                    <div class='close mr-2 mt-1' @click='closeCalendar()'>
                        <i class="fas fa-x"></i>X
                    </div>
                    <p class="text text-center mt-2">
                        Semaine de grossesse: {{ currentWeek +1}}
                    </p>
                    <div class="weeks">
                        <div class="container">
                            <div class="row">
                                <div v-for="(week, index) in calendar" :key="index"
                                    :class="['week', 'col-2', { 'box': index === currentWeek }]">
                                    <h4>Semaine {{ index + 1 }}</h4>
                                    <ul>
                                        <li v-for="(day, dayIndex) in week" :key="dayIndex">
                                            {{ day }} {{ }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <p class='text text-justify' v-if='results != null'>
                    Vous êtes enceinte de: <span> {{  convertir(durationInDays)  }} </span> <br>
                    bravo, vous avez fait: <span> {{ format((durationInDays *100)/280 ) }} % du chemin</span>
                    <br>
                    Date de conception: <span>{{ formatDate(conceptionDate) }}</span> <br>
                    Date d'accouchement : <span>{{  formatDate(dueDate)  }}</span> <br>
                    Durée d'aménorrhées: <span>{{ convertir(AndurationInDays) }} </span> <br>
                    Date limite pour déclarer votre grossesse: <span>{{ formatDate(dateOfAnnounement) }}</span>
                </p>
                <p class='text text-justify'>
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
                    Date d'accouchement : <span>{{  formatDate(dueDate)}}</span> <br>
                </p>

                <p class='text text-justify'>
                    La plupart des personnes ne connaissent pas la date exacte de conception, c'est pourquoi le terme
                    est de 280 jours à compter du premier jour des dernières règles. Si vous connaissez votre date
                    de conception, la date d'accouchement peut être calculée en lui ajoutant 266 jours. Une marge de 7
                    jours
                    en plus ou en moins est à prendre en considération. Il est
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
                    <strong> Date limite pour déclarer votre grossesse:</strong> <span>{{ dateOfAnnounement}}</span>
                    <br>

                    <strong>Date de début de votre congé maternité: </strong> <span>{{ formatDate(dateVacA)}}</span>
                    <br>
                    <strong>Date de fin de votre congé maternité:</strong> <span>{{ formatDate(dateVacB)}}</span> <br>
                    <strong>Vous serez pris en charge à 100% par l'assurance maladie à partir du:</strong>
                    <span>{{ formatDate(dateCare) }}</span> <br>
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

                <p class='text text-justify' v-if='results != null'>
                    <label for=''>
                        Cycle : <select name='' id='' v-model='cycle' style='height: 28px'>
                            <option value='24'>24</option>
                            <option value='28'>28</option>
                            <option value='36'>36</option>
                        </select>
                    </label> <br>


                    <button class='btn btn-primary ml-5' @click='proceedVac()'
                        style='color: #f0c7c2; margin-left: 10px; background-color: #393F82'>
                        Calculer
                    </button>
                </p>


                <p class='text text-justify' v-if='resultsFert != null'>
                    <strong>Période d'ovulation:</strong> entre le< span> {{  formatDate(fecondDateA)  }} </>
                    et le
                    <span>{{  formatDate(fecondDateB) }}</span> <br>
                </p>


                <p class='text text-justify'>
                    Pour déterminer votre cycle d’ovulation, il suffit en définitive de connaître votre cycle menstruel.
                    Celui-ci commence le premier jour de vos règles et s’achève le premier jour des règles suivantes. En
                    moyenne, le cycle menstruel est de 28 jours, mais certaines femmes ont des cycles plus courts,
                    jusqu’à 22 jours, tandis que d’autres ont des cycles beaucoup plus longs, pouvant durer jusqu’à 35,
                    voire 40 jours. <br>

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


    </div>
    <?php include 'parts/footer.php'; ?>
</body>

</html>