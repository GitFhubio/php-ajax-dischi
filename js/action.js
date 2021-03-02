const app = new Vue( {
    el: '#app',
    data: {
       selected: 'All',
       listCds: [],
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

   }
});
