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
                <div class="main__image">
                    <img src="public/img/Humaaans_Standing.png" alt="">
                </div>

                <div class="main__text">
                    <h1 class="title">
                        Calendrier de grossesse
                    </h1>

                    <p class="text text-justify">
                        bienvenue sur le calendrier, <br> veuillez choisir une date
                        pour le calcul
                    </p>

                    <div class="form">
                        <label for="">
                            <input type="date" class="date" v-model='date'>
                        </label>

                        <div>
                            <input type="radio" id="contactChoice1" @click='proceed()' name="contact" value="email">
                            <label for="contactChoice1">Email</label>

                            <input type="radio" id="contactChoice2" name="contact" value="telephone" @click='proceed()'>
                            <label for="contactChoice2">Téléphone</label>
                        </div>

                    </div>

                    <div class="results" v-if='showResults'>
                        <p class="text text-justify">
                            Vous etes span de <span> 6 mois 2 sem et 3 jours</span>, <br>
                            bravo, vous avez fait <span>60 % du chemin</span> <br>
                            Date prévue d'accouchement prévue: <span>15/09/2023</span> <br>
                            Date de conception: <span>11/01/2023</span> <br>
                            Date limite pour déclarer votre grossesse: <span>15/03/2023</span> <br>
                            Date limite pour effectuer le test de trisomie 21: <span>entre le 01/03/2023 et le
                                15/04/2023</span>
                        </p>
                    </div>

                    <div class="results" v-if='showEchography'>
                        <p class="text text-justify">
                            Echographie
                        </p>
                    </div>


                    <div class="buttons">
                        <button class="btn btn-primary" @click='displayEchography()'>
                            Echographie
                        </button>

                        <button class="btn btn-primary" @click='display()'>
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

        </div>
    </div>
    <?php include 'parts/footer.php'; ?>
</body>

</html>