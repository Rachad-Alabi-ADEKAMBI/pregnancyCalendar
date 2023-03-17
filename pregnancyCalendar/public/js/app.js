
const { createApp } = Vue

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
        lastSexDate: '',
        lastPeriodDate: '',
        results: null
    }
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
        if(this.lastPeriodDate == '' && this.lastSexDate==''){
            alert('Veuillez renseigner soit la date des dernières règles soit celle de la conception')
        } else{
            this.showResults= true;
            this.showButtons = true;
            this.showEchography = false;
            this.showAppointments= false,
            this.showMore= false,
            this.showVacancies= false,
            this.showCalendar= false;
        }

     },
     displayEchography(){
        this.showResults = false;
        this.showButtons = true;
        this.showEchography = true
        this.showAppointments= false,
        this.showMore= false,
        this.showVacancies= false,
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