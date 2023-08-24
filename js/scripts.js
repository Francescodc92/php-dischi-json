const { createApp } =  Vue;

createApp({
  data(){
    return {
      songsArray: []
    }
  },
  created(){
    axios
      .get('http://localhost/php/004-php-dischi-json/api.php')
      .then((res)=> {

        this.songsArray = res.data;
        console.log(res.data);
      })
      .catch((error)=>{
        console.log(error);
      })
  }

}).mount('#app');