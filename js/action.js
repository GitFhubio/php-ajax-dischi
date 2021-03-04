const app = new Vue( {
    el: '#app',
    data: {
      search:'',
       listCds: [],
       filter:'All',
       errormessage:'',
       listGenre:[]
    },
    mounted () {
        axios.get('http://localhost:8888/php-ajax-dischi/app/server.php')
        .then( response => {
            console.log(response.data);
            this.listCds=response.data;
            // quanto segue mi serve solo a generare la lista dinamicamente in html,nessun filtro in js
            this.listCds.forEach((cd) => {
              if(!this.listGenre.includes(cd.genre)) {
                this.listGenre.push(cd.genre);
                console.log(this.listGenre);
          }})
        })}
            ,
    methods:{
    filterGenre(){
      let self=this;
             // axios.get('http://localhost:8888/php-ajax-dischi/app/server.php?filter=0')
             //  axios.get('http://localhost:8888/php-ajax-dischi/app/server.php?filter=ciao')
             if (this.filter != 'All'){
       axios.get('http://localhost:8888/php-ajax-dischi/app/server.php?filter='+this.filter)
       .then( response => {
           console.log(response.data);
           this.listCds=response.data;
         })
       //   .catch(function (error) {
       //   console.log(error.message);
       //   self.errormessage="Il genere selezionato non esiste: "+error.message;
       // });
    } else {
      axios.get('http://localhost:8888/php-ajax-dischi/app/server.php')
      .then( response => {
          console.log(response.data);
          this.listCds=response.data;
    })}},
    searchGenre(){
      let self=this;
      if (this.search !='All'){
       axios.get('http://localhost:8888/php-ajax-dischi/app/server.php?filter='+this.search)
       .then( response => {
           console.log(response.data);
           this.listCds=response.data;
         })
         .catch(function (error) {
         console.log(typeof error.response.data);
         // console.log(error.response.status);
         if(error.response.status == 400){
         self.errormessage='Errore ['+ error.response.status + '] - '+ error.response.data;
       }
       if(error.response.status == 429){
         self.errormessage='Errore ['+ error.response.status + '] - Sta rispondendo ad altri hotwell.';
       }

    })
  } else{

    axios.get('http://localhost:8888/php-ajax-dischi/app/server.php')
    .then( response => {
        console.log(response.data);
        this.listCds=response.data;
  })}

    }
}
});
