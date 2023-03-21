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
      dateTriso2: ''

    }
  },
  computed: {
    getDueDate() {
      return new Date(
        this.lastPeriodDate
          ? new Date(this.lastPeriodDate).getTime() + 288 * 24 * 60 * 60 * 1000
          : new Date(this.conceptionDate).getTime() + 266 * 24 * 60 * 60 * 1000
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
          this.durationInWeeks = Math.floor(this.durationInDays / 7);
          this.durationInMonths = Math.floor(this.durationInDays / 30);
          this.durationInMonthsFormated = this.durationInMonths + 1;

          this.dueDate = this.getDueDate;

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
          );

          this.dateTriso1 =  new Date(
            ( this.lastPeriodDate
             ? new Date(this.lastPeriodDate).getTime() + 116 * 24 * 60 * 60 * 1000
             : new Date(this.conceptionDate).getTime() + 95 * 24 * 60 * 60 * 1000)
           );


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