
const { createApp } = Vue

createApp({
  data() {
    return {
        showHome: false,
        showMenu: false,
        date: '',
        showResults: false,
        showEchography: false,
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
    displayHome() {
       this.showHome = true;
       this.showButtons = false;
       this.showResults = false;
       alert('ok');
       console.log('ok0');
    },
     displayEchography(){
        this.showResults = false;
        this.showButtons = true;
        this.showEchography = true
     },
     proceed(){
        this.showResults= true;
        this.showButtons = true;
        this.showEchography = false;

     },

    format(num){
    let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
    return res;
},
    getImgUrl(pic) {
    return "public/img/" + pic;
},
}
  }).mount('#app')