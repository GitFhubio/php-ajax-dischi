const app = new Vue( {
    el: '#app',
    data: {
       listCds: [],
       filter:'',
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
       axios.get('http://localhost:8888/php-ajax-dischi/app/server.php?filter='+this.filter)
       .then( response => {
           console.log(response.data);
           this.listCds=response.data;
         })
    }
   }
});
