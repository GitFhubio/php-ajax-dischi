const app = new Vue( {
    el: '#app',
    data: {
       listCds: [],
       filter:'All',
       errormessage:''
    },
    mounted () {
        axios.get('http://localhost:8888/php-ajax-dischi/app/server.php')
        .then( response => {
            console.log(response.data);
            this.listCds=response.data;
          })
            }
            ,
    methods:{
    filterGenre(){
      let self=this;
       axios.get('http://localhost:8888/php-ajax-dischi/app/server.php?filter=boh')
       .then( response => {
           console.log(response.data);
           this.listCds=response.data;
         })
         .catch(function (error) {
         console.log(error.message);
         self.errormessage="Il genere selezionato non esiste: "+error.message;
       });
    }
   }
});
