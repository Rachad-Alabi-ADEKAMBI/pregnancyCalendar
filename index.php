<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'parts/meta.php'; ?>

    <title>Calendrier de grossesse - Accueil</title>

</head>

<body>
    <div class="app" id="app">
        <?php include 'parts/header.php'; ?>

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
                            Date de conception: <span>{{ conceptionDate }}</span> <br>
                            Date estimable d'accouchement : <span>{{dueDate}}</span> <br>
                            Durée d'aménorrhées: <span>{{ Anduration }} </span> <br>
                            Date limite pour déclarer votre grossesse: <span>{{ dateOfAnnounement}}</span> <br>
                            Date limite pour effectuer le test de trisomie 21: entre le <span>{{ dateTriso1 }} </span>
                            et le
                            <span>{{ dateTriso2 }}</span>
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
                            : entre le <span>{{ dateEco0A }} </span> et le <span> {{ dateEco0B }} </span>
                            <br>

                            1ère échographie recommandée autour de <span>12 SA</span>
                            : entre le <span>{{ dateEco1A}}</span> et le <span>{{ dateEco1B}}</span> <br>

                            2ème échographie recommandée autour de <span>22 SA</span>
                            : entre le <span>{{ dateEco2A }}</span> et le <span>{{ dateEco2B }}</span> <br>

                            3ème échographie recommandée autour de <span>32 SA</span>
                            : entre le <span>{{ dateEco3A }}</span> et le <span>{{ dateEco3B }}</span>
                        </p>
                    </div>


                    <div class='results' v-if='showAppointments'>
                        <h2 class='subtitle'>
                            Consultations
                        </h2>

                        <p class="text text-justify">
                            4ème mois de grossesse: entre le <span>{{ dateCons4A }}</span> et le
                            <span>{{ dateCons4B }} </span> <br>

                            5ème mois de grossesse: entre le <span>{{ dateCons5A }}</span> et le
                            <span>{{ dateCons5B }} </span> <br>

                            6ème mois de grossesse: entre le <span>{{ dateCons6A }}</span> et le
                            <span>{{ dateCons6B }} </span> <br>

                            7ème mois de grossesse: entre le <span>{{ dateCons7A }}</span> et le
                            <span>{{ dateCons7B }} </span> <br>

                            8ème mois de grossesse: entre le <span>{{ dateCons8A }}</span> et le
                            <span>{{ dateCons8B }} </span> <br>

                            9ème mois de grossesse: entre le <span>{{ dateCons9A }}</span> et le
                            <span>{{ dateCons9B }} </span>
                        </p>
                    </div>

                    <div class='results' v-if='showVacancies'>
                        <h2 class='subtitle'>
                            Congés
                        </h2>
                        <p class='text text-justify'>
                            <label for=''>
                                Nombre d'enfant(s) déjà né(s) : <select name='' id='' v-model='kids'>
                                    <option value='0'>0</option>
                                    <option value='1'>1</option>
                                    <option value='2'>2</option>
                                </select>
                            </label> <br>

                            <label for=''>
                                Vous êtes enceinte de <select name='' id='' v-model='kidsComing'>
                                    <option value='jumeaux'>Jumeaux</option>
                                    <option value='triples'>Triplés ou plus</option>
                                </select>
                            </label>

                            <button class="btn btn-primary ml-5" @click="proceedVac()">
                                Calculer
                            </button>
                        </p>

                        <p class="text text-justify" v-if='resultsVac != null'>
                            Début de votre congé maternité : <span>{{ dateVacA}}</span> <br>
                            Fin de votre congé maternité : <span>{{ dateVacB}}</span> <br>
                            Date de pris en charge l'assurance maladie:
                            <span>{{ dateCare }}</span> <br>
                        </p>



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


                    <div v-if="showButtons" class="buttons">
                        <label>
                            <input type="radio" name="menu-option" value="terme-grossesse" @click="proceed()">
                            Terme grossesse
                        </label>

                        <label>
                            <input type="radio" name="menu-option" value="echographie" @click="displayEchography()">
                            Echographie
                        </label>

                        <label>
                            <input type="radio" name="menu-option" value="consultations" @click="displayAppointments()">
                            Consultations
                        </label>

                        <label>
                            <input type="radio" name="menu-option" value="conges-maternite" @click="displayVacancies()">
                            Congés maternité
                        </label>

                        <label>
                            <input type="radio" name="menu-option" value="calendrier" @click="displayCalendar()">
                            Calendrier
                        </label>

                        <label>
                            <input type="radio" name="menu-option" value="plus" @click="displayMore()">
                            Plus
                        </label>
                    </div>

                </div>

            </div>

            <div class='item'>
                <h2>
                    calendrier de grossesse:
                </h2>

                <p class='text text-justify' v-if='results != null'>
                    Vous êtes enceinte de: <span> {{  convertir(durationInDays)  }} </span> <br>
                    Bravo, vous avez fait: <span> {{ format((durationInDays *100)/316 ) }} % du chemin</span>
                    <br>
                    Date de conception: <span>{{ conceptionDate }}</span> <br>
                    Durée d'aménorrhées: <span>{{ Anduration }} </span> <br>
                    Date limite pour déclarer votre grossesse: <span>{{ dateOfAnnounement}}</span> <br>
                    Dates limite pour effectuer le test de trisomie 21: entre le <span>{{ dateTriso1 }} </span>
                    et le
                    <span>{{ dateTriso2 }}</span>
                </p>

                <p class='text'>
                    Le calendrier de grossesse d'une femme est un outil utile pour suivre les différentes étapes de la
                    grossesse et s'assurer que tout se passe bien pour la mère et le bébé. Il commence généralement à la
                    date prévue de la dernière période menstruelle et se poursuit jusqu'à la naissance du bébé, soit
                    environ 40 semaines plus tard.
                </p>
            </div>
            <hr>

            <div class='item' id="dueDate">
                <h2>
                    calcul date d'accouchement
                </h2>

                <p class='text text-justify' v-if='results != null'>
                    Date estimable d'accouchement : <span>{{dueDate}}</span> <br>
                </p>

                <p class='text text-justify'>
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

                <p class='text text-justify' v-if='results != null'>


                    Echographie précoce autour de 7 SA
                    : entre <span>le 17/12/2022 et le 13/01/2023
                    </span> <br>
                    1ère échographie recommandée autour de 12 SA
                    : entre le <span>21/01/2023 et le 17/02/2023</span> <br>

                    2ème échographie recommandée autour de 22 SA
                    : entre le <span>25/03/2023 et le 05/05/2023
                    </span> <br>
                    3ème échographie recommandée autour de 32 SA
                    : entre le <span>03/06/2023 et le 14/07/2023
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

                <p class='text text-justify' v-if='results != null'>
                    <label for=''>
                        Nombre d'enfant(s) déjà né(s) : <select name='' id='' v-model='kids'>
                            <option value='0'>0</option>
                            <option value='1'>1</option>
                            <option value='2'>2</option>
                        </select>
                    </label> <br>

                    <label for=''>
                        Vous êtes enceinte de <select name='' id='' v-model='kidsComing'>
                            <option value='jumeaux'>Jumeaux</option>
                            <option value='triples'>Triplés ou plus</option>
                        </select>
                    </label>

                    <button class="btn btn-primary" onclick="proceedVac()">
                        Calculer
                    </button>
                </p>
                <br>

                <p class="text text-justify" v-if='resultsVac != null'>
                    Date de début de votre congé maternité : <span>{{ dateVacA}}</span> <br>
                    Date de fin de votre congé maternité : <span>{{ dateVacB}}</span> <br>
                    Vous serez pris en charge à 100% par l'assurance maladie à partir du :
                    <span>{{ dateCare }}</span> <br>
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
    <?php include 'parts/footer.php'; ?>
</body>

</html>