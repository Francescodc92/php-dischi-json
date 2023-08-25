const { createApp } =  Vue;

createApp({
  data(){
    return {
      songsArray: [],
      singleSongInfo : null,
    }
  },
  methods: {
    moreInfo(index) {
      axios
      .get("http://localhost/php/004-php-dischi-json/singleSong.php", {
        params:{
          songID: index
        }
      })
      .then((res)=> {
        this.singleSongInfo = res.data;
      })
      .catch((error)=>{
        console.log(error);
      })
    },
    closeModal(){
      this.singleSongInfo = null;
    }
  },
  created(){
    axios
      .get('http://localhost/php/004-php-dischi-json/api.php')
      .then((res)=> {
        this.songsArray = res.data;
      })
      .catch((error)=>{
        console.log(error);
      })
  }

}).mount('#app');