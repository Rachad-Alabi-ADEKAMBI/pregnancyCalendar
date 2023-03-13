
const { createApp } = Vue

createApp({
  data() {
    return {
        showHome: true,
        showMenu: false,
        showResults: true
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
       this.showMenu =  false
    },
    displayMenu() {
        this.showHome = false;
        this.showMenu =  true;
        alert('ok');
     },
     proceed(){
        this.showResults= true;
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