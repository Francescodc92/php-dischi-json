const { createApp } =  Vue;

createApp({
  data(){
    return {
      songsArray: [],
      singleSongInfo : {},
      modalOpen : false
    }
  },
  methods: {
    moreInfo(index) {
      axios
      .get(`http://localhost/php/004-php-dischi-json/api.php?id_song=${index}`)
      .then((res)=> {
        this.singleSongInfo = res.data;
        this.modalOpen = true
       
        console.log(res.data)
      })
      .catch((error)=>{
        console.log(error);
      })
    },
    closeModal(){
      this.modalOpen = false;
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