const { createApp } = Vue;

createApp({
  data() {
    return {
      showResults: false,
      showEchography: false,
      showAppointments: false,
      showMore: false,
      showVacancies: false,
      showOvulation: false,
      showButtons: false,
      results: null,
      lastPeriodDate: '',
      conceptionDate: '',
      durationInMs: '',
      durationInDays: '',
      durationInWeeks: '',
      durationInMonths: '',
      dueDate: '',
      dueDateFormated: '',
      AndurationInDays: '',
      AndurationInDays: '',
      Anduration: '',
      dateOfAnnounement: '',
      dateTriso1: '',
      dateTriso2: '',
      dateEco0A: '',
      dateEco0B: '',
      dateEco1A:'',
      dateEco1B:'',
      dateEco2A:'',
      dateEco2B:'',
      dateEco3A:'',
      dateEco3B:'',
      dateCons4A: '',
      dateCons4B: '',
      dateCons5A: '',
      dateCons5B: '',
      dateCons6A: '',
      dateCons6B: '',
      dateCons7A: '',
      dateCons7B: '',
      dateCons8A: '',
      dateCons8B: '',
      dateCons9A: '',
      dateCons9B: '',
      dateVacA: '',
      dateVacB:'',
      dateCare: '',
      kids: '',
      kidsComing: '',
      resultsVac: null,
      prematureDate: '',
      anesthDate: '',
      dateVagA: '',
      dateVagB: '',
      fecondDateA: '',
      fecondDateB: ''
    }
  },
  computed: {

  },
  methods: {
    proceed() {
      if (this.lastPeriodDate === '' && this.conceptionDate === '') {
        alert('Veuillez renseigner soit la date des dernières règles soit celle de la conception');
      } else {

        if (this.conceptionDate === '') {
          const startDate = new Date(this.lastPeriodDate);
          startDate.setDate(startDate.getDate() + 14);
        this.conceptionDate = startDate;
        }

        const today = new Date();

        this.durationInMs = today - this.conceptionDate;

        if(this.durationInMs < 0){
         alert("Merci de vérifier la date insérée");
         exit();
        }

       this.durationInDays = Math.floor((this.durationInMs / 1000 / 60 / 60 / 24));

        if(this.durationInDays > 300){
          alert("Merci de vérifier la date insérée")
        } else{
          this.results = 'ok';

          this.durationInWeeks = Math.floor(this.durationInDays / 7);
          this.durationInMonths = Math.floor(this.durationInDays / 30);
          this.durationInMonthsFormated = this.durationInMonths + 1;

          function addDays(date, days) {
            var result = new Date(date);
            result.setDate(result.getDate() + days);
            return result;
          }
          this.dueDate = addDays(this.conceptionDate, 266);

          this.AndurationInDays = this.durationInDays + 14;

          this.dateOfAnnounement = addDays(this.conceptionDate, 90);

          this.dateTriso1 = addDays(this.conceptionDate + 14 + 77 )

          this.dateTriso2 = addDays(this.conceptionDate + 14 + 98 )


/*


        //echographies
        let nextPeriodStartDate = new Date(this.lastPeriodDate);
        nextPeriodStartDate.setDate(nextPeriodStartDate.getDate() + 36);
        this.dateEco0A = nextPeriodStartDate.toLocaleDateString('fr-FR');

        nextPeriodStartDate.setDate(nextPeriodStartDate.getDate() + 27);
        this.dateEco0B = nextPeriodStartDate.toLocaleDateString('fr-FR');

        nextPeriodStartDate.setDate(nextPeriodStartDate.getDate() + 8);
        this.dateEco1A = nextPeriodStartDate.toLocaleDateString('fr-FR');

        nextPeriodStartDate.setDate(nextPeriodStartDate.getDate() + 27);
        this.dateEco1B = nextPeriodStartDate.toLocaleDateString('fr-FR');

        nextPeriodStartDate.setDate(nextPeriodStartDate.getDate() + 36);
        this.dateEco2A = nextPeriodStartDate.toLocaleDateString('fr-FR');

        nextPeriodStartDate.setDate(nextPeriodStartDate.getDate() + 45);
        this.dateEco2B = nextPeriodStartDate.toLocaleDateString('fr-FR');

        nextPeriodStartDate.setDate(nextPeriodStartDate.getDate() + 25);
        this.dateEco3A = nextPeriodStartDate.toLocaleDateString('fr-FR');

        nextPeriodStartDate.setDate(nextPeriodStartDate.getDate() + 41);
        this.dateEco3B = nextPeriodStartDate.toLocaleDateString('fr-FR');

        //consultations
        let nextAppStartDate = new Date(this.lastPeriodDate);
        nextAppStartDate.setDate(nextAppStartDate.getDate() + 106);
        this.dateCons4A = nextAppStartDate.toLocaleDateString('fr-FR');

        nextAppStartDate.setDate(nextAppStartDate.getDate() + 30);
        this.dateCons4B = nextAppStartDate.toLocaleDateString('fr-FR');

        nextAppStartDate.setDate(nextAppStartDate.getDate() + 2);
        this.dateCons5A = nextAppStartDate.toLocaleDateString('fr-FR');

        nextAppStartDate.setDate(nextAppStartDate.getDate() + 30);
        this.dateCons5B = nextAppStartDate.toLocaleDateString('fr-FR');

        nextAppStartDate.setDate(nextAppStartDate.getDate() + 1);
        this.dateCons6A = nextAppStartDate.toLocaleDateString('fr-FR');

        nextAppStartDate.setDate(nextAppStartDate.getDate() + 30);
        this.dateCons6B = nextAppStartDate.toLocaleDateString('fr-FR');

        nextAppStartDate.setDate(nextAppStartDate.getDate() + 1);
        this.dateCons7A = nextAppStartDate.toLocaleDateString('fr-FR');

        nextAppStartDate.setDate(nextAppStartDate.getDate() + 30);
        this.dateCons7B = nextAppStartDate.toLocaleDateString('fr-FR');

        nextAppStartDate.setDate(nextAppStartDate.getDate() + 1);
        this.dateCons8A = nextAppStartDate.toLocaleDateString('fr-FR');

        nextAppStartDate.setDate(nextAppStartDate.getDate() + 30);
        this.dateCons8B = nextAppStartDate.toLocaleDateString('fr-FR');

        nextAppStartDate.setDate(nextAppStartDate.getDate() + 1);
        this.dateCons9A = nextAppStartDate.toLocaleDateString('fr-FR');

        nextAppStartDate.setDate(nextAppStartDate.getDate() + 30);
        this.dateCons9B = nextAppStartDate.toLocaleDateString('fr-FR');


        //more
        let nextPrematureStartDate = new Date(this.lastPeriodDate);
        nextPrematureStartDate.setDate(nextAppStartDate.getDate() + 234);
        this.prematureDate = nextPrematureStartDate.toLocaleDateString('fr-FR');

        nextPrematureStartDate.setDate(nextPrematureStartDate.getDate() + 4);
        this.anesthDate = nextPrematureStartDate.toLocaleDateString('fr-FR');

        nextPrematureStartDate.setDate(nextPrematureStartDate.getDate() -18);
        this.dateVagA = nextPrematureStartDate.toLocaleDateString('fr-FR');

        nextPrematureStartDate.setDate(nextPrematureStartDate.getDate() +27);
        this.dateVagB = nextPrematureStartDate.toLocaleDateString('fr-FR');
*/


          this.showResults = true;
          this.showButtons = true;
          this.showEchography = false;
          this.showAppointments = false;
          this.showMore = false;
          this.showVacancies = false;
          this.showOvulation = false;
        }
      }
    },
    proceedVac(){
        //vacancies
        if (this.kids === '' && this.kidsComing === '') {
            alert('Merci de renseigner des informations pour le calcul')
        }else{
          this.resultsVac = 'ok';
          let nextVacStartDate = new Date(this.lastPeriodDate);

          let days1 = 0;
          let days2 = 0;
          let days3 = 0


        if(this.kids < 2){
          days1 = 245;
             days2 = 111;
             days3=189;
      }

        if(this.kids >= 2){
          days1 = 231;
             days2 = 181;
             days3=239;
        }

        if(this.kidsComing == 'jumeaux'){
          days1 = 84;
          days2 = 154;
        }


        if(this.kidsComing == 'triplés'){
          days1 = 167;
          days2 = 154;
        }

        nextVacStartDate.setDate(nextVacStartDate.getDate() + days1);
        this.dateVacA = nextVacStartDate.toLocaleDateString('fr-FR');

        nextVacStartDate.setDate(nextVacStartDate.getDate() + days2);
        this.dateVacB = nextVacStartDate.toLocaleDateString('fr-FR');


        nextVacStartDate.setDate(nextVacStartDate.getDate() - days3);
        this.dateCare = nextVacStartDate.toLocaleDateString('fr-FR');

        }
      },
       formatDate(date) {
        const formattedDate = date.toLocaleDateString('fr-FR');
        return formattedDate;
      },
      convertir(jours) {
        const joursParMois = 30.44;
        const joursParSemaine = 7;

        const mois = Math.floor(jours / joursParMois);
        const resteMois = jours % joursParMois;

        const semaines = Math.floor(resteMois / joursParSemaine);
        const resteSemaines = resteMois % joursParSemaine;

        const joursRestants = Math.floor(resteSemaines);

        // Ajouter "s" si nécessaire
        const moisPluriel = mois > 1 ? "mois" : "mois";
        const semainesPluriel = semaines > 1 ? "semaines" : "semaine";
        const joursPluriel = joursRestants > 1 ? "jours" : "jour";

        return `${mois} ${moisPluriel}, ${semaines} ${semainesPluriel} et ${joursRestants} ${joursPluriel}`;
      },



    format(num) {
      let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 2 }).format(num);
      return res;
    },

    displayEchography() {
      this.showResults = false;
      this.showButtons = true;
      this.showEchography = true;
      this.showAppointments = false;
      this.showMore = false;
      this.showVacancies = false;
      this.showOvulation = false;
    },
    displayVacancies() {
      this.showResults = false;
      this.showButtons = true;
      this.showEchography = false;
      this.showAppointments = false;
      this.showMore = false;
      this.showVacancies = true;
      this.showOvulation = false;
    },
    displayAppointments(){
        this.showResults = false;
        this.showButtons = true;
        this.showEchography = false;
        this.showAppointments= true
        this.showMore= false,
        this.showVacancies= false,
        this.showOvulation= false
     },
     displayMore(){
        this.showResults = false;
        this.showButtons = true;
        this.showEchography = false;
        this.showAppointments= false;
        this.showMore= true;
        this.showVacancies= false;
        this.showOvulation= false
     },
     displayOvulation(){
      this.showResults = false;
      this.showButtons = true;
      this.showEchography = false;
      this.showAppointments= false;
      this.showMore= false
      this.showVacancies= false;
      this.showOvulation= true
     },
    format(num){
    let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 1 }).format(num);
    return res;
},
    getImgUrl(pic) {
    return "public/img/" + pic;
}
  },

  }).mount('#app')