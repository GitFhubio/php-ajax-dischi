const app = new Vue( {
    el: '#app',
    data: {
       selected: 'All',
       listCds: [],
       listfiltered:[],
       listGenre:[]
    },
    mounted () {
        axios.get('http://localhost:8888/php-ajax-dischi/app/server.php')
        .then( response => {
            console.log(response.data);
          })
            }
            ,
    methods:{

   }
});
