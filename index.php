<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'parts/meta.php'; ?>

    <title>Calendrier de grossesse - Accueil</title>

</head>

<body>
    <div class="app" id="app">
        <?php include 'parts/header.php'; ?>

        <div class="content">
            <div class="main" v-if='showHome'>
                <div class="main__text">
                    <h1 class="title">
                        Calendrier de grossesse
                    </h1>

                    <div class="proceed">
                        <p class="text text-justify">
                            bienvenue sur le calendrier, <br>
                        </p>

                        <div class="form">
                            <label for="">Date des dernières règles:
                                <input type="date" class="date" v-model="periodDate">
                            </label>

                            <label for="">Date de conception:
                                <input type="date" class="date" v-model="sexDate">
                            </label>
                        </div>

                        <button @click='proceed()' class="btn btn-primary">
                            Calculer
                        </button>

                    </div>

                    <div class="results" v-if='showResults'>
                        <p class="text text-justify">
                            Date des dernières règles: <span>{{ periodDate }}</span> <br>
                            Vous etes enceinte de: <span> {{grossesseDuration}} </span> <br>
                            bravo, vous avez fait: <span> {{ pourcentageGrossesse }} % du chemin</span> <br>
                            Date estimable d'accouchement : <span>{{dueDate}}</span> <br>
                            Date limite pour déclarer votre grossesse: <span>15/03/2023</span> <br>
                            Date de conception: <span>{{sexDate}}</span> <br>
                            Date limite pour effectuer le test de trisomie 21: <span>entre le 01/03/2023 et le
                                15/04/2023</span>
                        </p>
                    </div>

                    <div class="results" v-if='showCalendar'>
                        <p class="text text-justify">
                            Calendar
                        </p>
                    </div>

                    <div class="results" v-if='showEchography'>
                        <p class="text text-justify">
                            Echographie
                        </p>
                    </div>


                    <div class="results" v-if='showAppointments'>
                        <p class="text text-justify">
                            Consultations
                        </p>
                    </div>

                    <div class="results" v-if='showVacancies'>
                        <p class="text text-justify">
                            Congés
                        </p>
                    </div>


                    <div class="results" v-if='showMore'>
                        <p class="text text-justify">
                            plus
                        </p>
                    </div>


                    <div class="buttons" v-if='showButtons'>
                        <button class="btn btn-primary" @click='displayEchography()'>
                            Echographie
                        </button>

                        <button class="btn btn-primary" @click='displayCalendar()'>
                            Semaine par semaine
                        </button>

                        <button class="btn btn-primary" @click='displayAppointments()'>
                            Consultations
                        </button>


                        <button class="btn btn-primary" @click='displayVacancies()'>
                            Congés maternité
                        </button>

                        <button class="btn btn-primary" @click='displayMore()'>
                            Plus
                        </button>
                    </div>
                </div>

            </div>

            <div class="item">
                <h2>
                    calcul terme grossesse
                </h2>

                <p class="text">
                    Il est facile de déterminer la durée estimable de
                    votre grossesse en cours avec comme informations de base
                    la date de vos dernières règles ou encore celle de
                    la conception . <br>
                    D'après les informations fournies vous etes au
                    <span>8e mois, 3semain et 30 jours</span>
                </p>
            </div>
            <hr>

            <div class="item">
                <h2>
                    calcul date d'accouchement
                </h2>

                <p class="text">
                    Il est possible d'estimer la date probable de votre
                    accocuhement. <br>
                    D'après les informations fournies devrirez accoucher le
                    <span>20/06/2023</span>
                </p>
            </div>
            <hr>

            <div class="item">
                <h2>
                    calcul date d'ovulation
                </h2>

                <p class="text">
                    Pour calculer la période de votre ovulation il faut <br>
                    D'après les informations fournies
                    vous serez fertile entre le
                    <span>20/06/2023</span> et le <span>29/06/2023</span>
                </p>
            </div>
        </div>
    </div>
    <?php include 'parts/footer.php'; ?>
</body>

</html>