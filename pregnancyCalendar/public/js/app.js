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
      fecondDateB: '',
      showCalendar: false
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

          this.dateTriso1 = addDays(this.conceptionDate, 64 )

          this.dateTriso2 = addDays(this.conceptionDate, 49 )

          this.dateEco0A = addDays(this.conceptionDate, 21 )

          this.dateEco0B = addDays(this.conceptionDate, 53 )

          this.dateEco1A = addDays(this.conceptionDate, 60 )

          this.dateEco1B = addDays(this.conceptionDate, 71 )

          this.dateEco2A = addDays(this.conceptionDate, 120)

          this.dateEco2B = addDays(this.conceptionDate, 171)

          this.dateEco3A = addDays(this.conceptionDate, 211 )

          this.dateEco3B = addDays(this.conceptionDate, 288)


        this.dateCons4A  = addDays(this.conceptionDate, 90)

        this.dateCons4B  = addDays(this.conceptionDate, 120)

        this.dateCons5A  = addDays(this.conceptionDate, 121)

        this.dateCons5B  = addDays(this.conceptionDate, 151)

        this.dateCons6A  = addDays(this.conceptionDate, 152)

        this.dateCons6B  = addDays(this.conceptionDate, 182)

        this.dateCons7A  = addDays(this.conceptionDate, 183)

        this.dateCons7B  = addDays(this.conceptionDate, 213)

        this.dateCons8A  = addDays(this.conceptionDate, 214)

        this.dateCons8B  = addDays(this.conceptionDate, 244)

        this.dateCons9A  = addDays(this.conceptionDate, 245)

        this.dateCons9B  = addDays(this.conceptionDate, 275)

        this.prematureDate = addDays(this.conceptionDate, 34 *7);

        this.anesthDate = addDays(this.conceptionDate, 243); //1

        this.dateVagA = addDays(this.conceptionDate, 225);

        this.dateVagB =  addDays(this.conceptionDate, 253);


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

       formatDate(date) {
        const options = {
          weekday: 'short',
          year: 'numeric',
          month: 'short',
          day: 'numeric'
        };
        const locale = 'fr-FR';
        const formattedDate = date.toLocaleString(locale, options);
        return formattedDate;
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
     displayCalendar(){
        this.showCalendar = true;
     },
     closeCalendar(){
      this.showCalendar = false;
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