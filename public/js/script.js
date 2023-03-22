const { createApp } = Vue;

createApp({
  data() {
    return {
      showResults: false,
      showEchography: false,
      showAppointments: false,
      showMore: false,
      showVacancies: false,
      showCalendar: false,
      showButtons: false,
      results: null,
      lastPeriodDate: '',
      conceptionDate: '',
      durationInDays: '',
      durationInWeeks: '',
      durationInMonths: '',
      durationInMonthsFormated: '',
      dueDate: '',
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
      resultsVac: null
    }
  },
  computed: {
    getDueDate() {
      return new Date(
        this.lastPeriodDate
          ? new Date(this.lastPeriodDate).getTime() + 289 * 24 * 60 * 60 * 1000
          : new Date(this.conceptionDate).getTime() + 267 * 24 * 60 * 60 * 1000
      );
    },
    dueDateFormat() {
     // return this.dueDate.toLocaleDateString();
     return this.dueDate;
    }
  },
  methods: {
    proceed() {
      if (this.lastPeriodDate === '' && this.conceptionDate === '') {
        alert('Veuillez renseigner soit la date des dernières règles soit celle de la conception');
      } else {
        const today = new Date();
        const startDate = this.lastPeriodDate  ? new Date(this.lastPeriodDate) : new Date(this.conceptionDate);
        const durationInMs = today - startDate;
        this.durationInDays = Math.floor((durationInMs / 1000 / 60 / 60 / 24));

        if(this.durationInDays > 300){
          alert("Merci de vérifier la date insérée")
        } else{
          this.results = 'ok';
          if (this.conceptionDate === '') {
            const startDate = new Date(this.lastPeriodDate);
            startDate.setDate(startDate.getDate() + 14);
          this.conceptionDate = startDate.toLocaleDateString('fr-FR');

          }

          this.durationInWeeks = Math.floor(this.durationInDays / 7);
          this.durationInMonths = Math.floor(this.durationInDays / 30);
          this.durationInMonthsFormated = this.durationInMonths + 1;

          this.dueDate = this.getDueDate.toLocaleDateString('fr-FR');

          this.AndurationInDays = Math.floor(durationInMs / 1000 / 60 / 60 / 24);
          this.AndurationInWeeks = Math.floor(this.AndurationInDays / 7);
          if (this.AndurationInDays % 7 === 0) {
            this.Anduration = this.AndurationInWeeks + ' semaines';
          } else if (this.AndurationInWeeks === 0) {
            this.Anduration = this.AndurationInDays + ' jour' + (this.AndurationInDays > 1 ? 's' : '');
          } else {
            this.Anduration = this.AndurationInWeeks + ' semaines ' + (this.AndurationInDays % 7) + ' jour' + ((this.AndurationInDays % 7) > 1 ? 's' : '');
          }

          this.dateOfAnnounement =  new Date(
           ( this.lastPeriodDate
            ? new Date(this.lastPeriodDate).getTime() + 104 * 24 * 60 * 60 * 1000
            : new Date(this.conceptionDate).getTime() + 89 * 24 * 60 * 60 * 1000)
          ).toLocaleDateString('fr-FR');;

          //trisomie 21
            const startDate = new Date(this.lastPeriodDate);
            startDate.setDate(startDate.getDate() + 78);
          this.dateTriso1 = startDate.toLocaleDateString('fr-FR');

          startDate.setDate(startDate.getDate() + 20);
        this.dateTriso2 = startDate.toLocaleDateString('fr-FR');


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

          this.showResults = true;
          this.showButtons = true;
          this.showEchography = false;
          this.showAppointments = false;
          this.showMore = false;
          this.showVacancies = false;
          this.showCalendar = false;
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

    convertir(jours) {
      const joursParMois = 30.44;
      const joursParSemaine = 7;

      const mois = Math.floor(jours / joursParMois);
      const resteMois = jours % joursParMois;

      const semaines = Math.floor(resteMois / joursParSemaine);
      const resteSemaines = resteMois % joursParSemaine;

      const joursRestants = Math.floor(resteSemaines);

      return `${mois} mois, ${semaines} semaine(s) et ${joursRestants} jour(s)`;
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
      this.showCalendar = false;
    },
    displayVacancies() {
      this.showResults = false;
      this.showButtons = true;
      this.showEchography = false;
      this.showAppointments = false;
      this.showMore = false;
      this.showVacancies = true;
      this.showCalendar = false;
    },
    displayAppointments(){
        this.showResults = false;
        this.showButtons = true;
        this.showEchography = false;
        this.showAppointments= true
        this.showMore= false,
        this.showVacancies= false,
        this.showCalendar= false
     },
     displayMore(){
        this.showResults = false;
        this.showButtons = true;
        this.showEchography = false;
        this.showAppointments= false;
        this.showMore= true;
        this.showVacancies= false;
        this.showCalendar= false
     },
     displayCalendar(){
      this.showResults = false;
      this.showButtons = true;
      this.showEchography = false;
      this.showAppointments= false;
      this.showMore= false
      this.showVacancies= false;
      this.showCalendar= true
     },
    format(num){
    let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
    return res;
},
    getImgUrl(pic) {
    return "public/img/" + pic;
}
  },

  }).mount('#app')