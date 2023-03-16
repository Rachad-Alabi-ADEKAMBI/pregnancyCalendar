
const { createApp } = Vue

createApp({
  data() {
    return {
        showHome: false,
        showMenu: false,
        showResults: false,
        showEchography: false,
        showAppointments: false,
        showMore: false,
        showVacancies: false,
        showCalendar: false,
        sexDate: '',
        periodDate: '',
        showButtons: false,
        lastPeriodDate: '',
        results: null,
    }
},
mounted: function() {
   this.displayHome();
},
computed: {
    filteredItems() {
        this.showUsers = false;
        this.showResults = true;
        return this.users.filter(user => {

            return user.first_name.toLowerCase().includes(this.searchText.toLowerCase()) &&
                user.last_name.toLowerCase().includes(this.searchText.toLowerCase())
        })
    }
},
methods: {
    proceed(){
        this.showResults= true;
        this.showButtons = true;
        this.showEchography = false;
        this.showAppointments= false,
        this.showMore= false,
        this.showVacancies= false,
        this.showCalendar= false;

        const lastPeriodMoment = moment(this.lastPeriodDate);
        const dueDateMoment = lastPeriodMoment.add(280, 'days');
        const now = moment();
        const grossesseDuration = moment.duration(now.diff(lastPeriodMoment));
        const weeks = Math.floor(grossesseDuration.asWeeks());
        const days = Math.floor(grossesseDuration.asDays()) - (weeks * 7);
        const months = Math.floor(weeks / 4.34524);
        const pourcentageGrossesse = Math.round((grossesseDuration.asDays() / 280) * 100);

        this.grossesseDuration = `${months} mois, ${weeks} semaines, et ${days} jours`;
        this.dueDate = dueDateMoment.format('MMMM Do YYYY');
        this.pourcentageGrossesse = pourcentageGrossesse;

     },
    displayHome() {
       this.showHome = true;
       this.showButtons = false;
       this.showResults = false;
       this.showAppointments= false,
       this.showMore= false,
       this.showVacanvies= false,
       this.showCalendar= false
    },
     displayEchography(){
        this.showResults = false;
        this.showButtons = true;
        this.showEchography = true
        this.showAppointments= false,
        this.showMore= false,
        this.showVacanvies= false,
        this.showCalendar= false
     },
     displayVacancies(){
        this.showResults = false;
        this.showButtons = true;
        this.showEchography = false;
        this.showAppointments= false,
        this.showMore= false,
        this.showVacancies= true,
        this.showCalendar= false
     },
     displayAppointments(){
        this.showResults = false;
        this.showButtons = true;
        this.showEchography = false;
        this.showAppointments= true
        this.showMore= false,
        this.showVacanvies= false,
        this.showCalendar= false
     },
     displayMore(){
        this.showResults = false;
        this.showButtons = true;
        this.showEchography = false;
        this.showAppointments= false;
        this.showMore= true;
        this.showVacanvies= false;
        this.showCalendar= false
     },
     displayCalendar(){
      this.showResults = false;
      this.showButtons = true;
      this.showEchography = false;
      this.showAppointments= false;
      this.showMore= false
      this.showVacanvies= false;
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