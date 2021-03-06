var eventBus = new Vue();

Vue.directive('phone', {
    bind(el) { 
      function replaceNumberForInput(value) {
        let val = ''
        const x = value.replace(/\D/g, '').match(/(\d{0,1})(\d{0,3})(\d{0,3})(\d{0,4})/)

        if (!x[2] && x[1] !== '') {
          val = (x[1] === '8' || x[1] === '7') ? x[1] : '7' + x[1]
        } else {
          val = !x[3] ? x[1] + x[2] : x[1] + '(' + x[2] + ') ' + x[3] + (x[4] ? '-' + x[4] : '')
        }

        return val
      }

      function replaceNumberForPaste(value) {
        const r = value.replace(/\D/g, '')
        let val = r
        if ((val.charAt(0) === '7')||(val.charAt(0) === '+')) {
          val = '7' + val.slice(1)
        }
        return replaceNumberForInput(val)
      }

      el.oninput = function(e) {
        if (!e.isTrusted) {
          return
        }
        this.value = replaceNumberForInput(this.value)
      }

      el.onpaste = function() {
        setTimeout(() => {
          const pasteVal = el.value
          this.value = replaceNumberForPaste(pasteVal)
        })
      }

    }
})




Vue.component('autorisation', {
    template: '#autorisation',
    data: function(){
        return{
            email:"",
            emailNotEnter:false,              
            password: "",
            passwordNotEnter:false,    
            
            messageText:"",
            showMsgBlk:false,
            msgOk:true
        }
    }, 

    created: function() {
        eventBus.$on("kabinet-relogin", ()=>{
            this.rellogin(); 
        });
    },



    methods:{ 
       toRegister() {
        eventBus.$emit("chenge-state","register");
       },
       
       toPasRec() {
        eventBus.$emit("chenge-state","passrec");
       },

       rellogin() {
     
            document.cookie = "agriautorise=0; path=/; max-age=0";
            document.cookie = "agritoken=0; path=/; max-age=0";
            document.cookie = "adm=0; path=/; max-age=0";

            localStorage.removeItem('name'); 
            localStorage.removeItem('company_name'); 
            localStorage.removeItem('mail'); 
            localStorage.removeItem('phone'); 
            localStorage.removeItem('inn'); 
            localStorage.removeItem('token'); 

            var params = new URLSearchParams();
            params.append('action', 'relogin');
            params.append('nonce', allAjax.nonce);
            params.append('email', this.email);

            axios.post(allAjax.ajaxurl, params);

            document.location.href = kabinet_page;
        },

       getAutorisation() {
            if (this.email == "") {this.emailNotEnter = true; return;};
            if (this.password == "") {this.passwordNotEnter = true; return;};

            var params = new URLSearchParams();
            params.append('action', 'user_autorization');
            params.append('nonce', allAjax.nonce);
            params.append('email', this.email);
            params.append('password', this.password);

            

            axios.post(allAjax.ajaxurl, params)
              .then((response) => {

                console.log(response);

                var d = new Date();
                d.setHours(d.getHours() + 5);

                document.cookie = "agriautorise="+response.data.mail+"; path=/; expires=" + d.toUTCString();
                document.cookie = "agritoken="+response.data.token+"; path=/; expires=" + d.toUTCString();
                document.cookie = "adm="+response.data.admin+"; path=/; expires=" + d.toUTCString();

                localStorage.setItem('name', response.data.name); 
                localStorage.setItem('company_name', response.data.company_name); 
                localStorage.setItem('mail', response.data.mail); 
                localStorage.setItem('phone', response.data.phone); 
                localStorage.setItem('inn', response.data.inn); 
                localStorage.setItem('token', response.data.token); 

                eventBus.$emit("cabinet_innit");
                eventBus.$emit("chenge-state","kabinet");
              })
              .catch((error)  => {
                console.log(error.response.data);
                this.messageText = error.response.data.error;
                this.showMsgBlk = true;
                this.msgOk = false;
              });
       }
    }
});

Vue.component('registration', {
    template: '#registration',
    data: function(){
        return{
            name: "", 
            nameNotEnter:false,        
            nameorg: "",
            nameorgNotEnter:false,         
            inn: "",         
            email: "",
            emailNotEnter:false,         
            tel: "",         
            password: "",
            passwordNotEnter:false,
            
            messageText:"",
            showMsgBlk:false,
            msgOk:true
        }
    }, 
    methods:{ 
       toAutorization() {
        eventBus.$emit("chenge-state","autorization");
       },
       
       registerUser () {
            if (this.name == "") {this.nameNotEnter = true; return;};
            if (this.nameorg == "") {this.nameorgNotEnter = true; return;};
            if (this.email == "") {this.emailNotEnter = true; return;};
            if (this.password == "") {this.passwordNotEnter = true; return;};

            var params = new URLSearchParams();
            params.append('action', 'user_register');
            params.append('nonce', allAjax.nonce);
            params.append('name', this.name);
            params.append('nameorg', this.nameorg);
            params.append('inn', this.inn);
            params.append('email', this.email);
            params.append('tel', this.tel);
            params.append('password', this.password);

            

            axios.post(allAjax.ajaxurl, params)
              .then((response) => {
                this.messageText = "???? ?????????????? ????????????????????????????????????. ?? ?????????????? 3 ?????????? ???????? ?????????????????? ???????????????????? ???????? ?????????????? ????????????.";
                this.showMsgBlk = true;
                this.msgOk = true;
              })
              .catch((error)  => {
                console.log(error.response.data);
                this.messageText = "???? ?????????? ?????????????????????? ?????????????????? ???????????? ???????????????? ???????????????????????? ?? ?????????? e-mail ?????? ?????????????????????????????? ?? ??????????????!";
                this.showMsgBlk = true;
                this.msgOk = false;
              });
       }
    }
});

Vue.component('passrec', {
    template: '#passrec',
    data: function(){
        return{
            email:"",
            emailNotEnter:false,

            messageText:"",
            showMsgBlk:false,
            msgOk:true        
        }
    }, 
    methods:{ 
       toAutorization() {
        eventBus.$emit("chenge-state","autorization");
       },

       getPassRec() {
            this.showMsgBlk = false;
            if (this.email == "") {this.emailNotEnter = true;  return;};

            var params = new URLSearchParams();
            params.append('action', 'pass_rec');
            params.append('nonce', allAjax.nonce);
            params.append('email', this.email);
            
            
            axios.post(allAjax.ajaxurl, params)
              .then((response) => {
                this.messageText = "???? ???????? ?????????????????????? ?????????? ???????????????? ???????????????????? ?????? ???????????????????????????? ????????????.";
                this.showMsgBlk = true;
                this.msgOk = true;

                console.log(response);
              })
              .catch((error)  => {
                this.messageText = "???????????????????????? ?? ?????????? ?????????????? ???? ??????????????!";
                this.showMsgBlk = true;
                this.msgOk = false;
                console.log(error);
              });
        
       } 
    }
});


Vue.component('statistic', {
  template: '#statistic',
  data: function(){
      return{
          statData:[],
      }
  }, 

  mounted: function() {
    eventBus.$on("stat_innit", ()=>{
      this.getStat(); 
    });
    if (getCookie("agriautorise") != undefined) {
      this.getStat();
    }
  },



  methods:{ 
    toKabinet() {
      eventBus.$emit("chenge-state","kabinet");
    },

    getStat() {
          let params = new URLSearchParams();
          params.append('action', 'get_stat');
          params.append('nonce', allAjax.nonce);
          params.append('email', localStorage.getItem('mail'));

          

          axios.post(allAjax.ajaxurl, params)
            .then((response) => {
              this.statData = response.data;  
                
            })
            .catch((error)  => {
              alert("???? ?????????? ?????????????????? ???????????????????? ?????????????????? ????????????! "+error.response.data.error );
              
            });
    }
  }
});

Vue.component('kabinet', {
    template: '#kabinet',
    data: function(){
        return{
            UsserZakaz:[],
            name:"",      
            company:"",      
            inn:"",      
            email:"",
            showStatLnk:true      
        }
    },
    mounted: function() {
        eventBus.$on("cabinet_innit", ()=>{
            this.getZakInfo(); 
            this.loadClientInfo(); 
            if (getCookie("adm") == 1) 
              this.showStatLnk = true;
            else this.showStatLnk = false;

        }); 
        

        if (getCookie("agriautorise") != undefined) {
            this.getZakInfo();
        }

        if (getCookie("adm") == 1) 
          this.showStatLnk = true;
          
         else this.showStatLnk = false;

        this.loadClientInfo();
         
    },
    
    methods: { 

        toStat() {
          
          eventBus.$emit("chenge-state","stat");
          eventBus.$emit("stat_innit");
        },

        loadClientInfo() {
            this.name = localStorage.getItem("name");
            this.company = localStorage.getItem("company_name");
            this.inn = localStorage.getItem("inn");
            this.email = localStorage.getItem("mail");
        },

        relogin() {
            eventBus.$emit("kabinet-relogin");
        },

        repeatZak (zakinfo) {
            var params = new URLSearchParams();
            params.append('action', 'send_to_new');
            params.append('nonce', allAjax.nonce);
           
            params.append('name', zakinfo.client_name);
            params.append('tel', zakinfo.client_phone);
            params.append('email', zakinfo.client_mail);
            params.append('city', zakinfo.client_city);
            params.append('kategory', zakinfo.client_ts_kat);
            params.append('data', zakinfo.client_data);
            params.append('time', zakinfo.client_time);
            params.append('punct', zakinfo.punkt_to);
            params.append('price', zakinfo.zak_summ);
            params.append('agentphone', localStorage.getItem('phone'));
            params.append('agentname', localStorage.getItem('name'));
            params.append('agentcompany', localStorage.getItem('company_name'));
            params.append('agentinn', localStorage.getItem('inn'));

            axios.post(allAjax.ajaxurl, params)
              .then(function (response) {
                window.location.href = toThencsPageUrl;
                this.spinerStart = false;
              })
              .catch(function (error) {
                console.log(error);
                alert(error);
                this.spinerStart = false;
              }); 
        },

        getZakDetales(zknumber) {
            this.UsserZakaz[zknumber].open_detale = !this.UsserZakaz[zknumber].open_detale;
        },

        getZakInfo() {
            let params = new URLSearchParams();
            params.append('action', 'get_zakinfo');
            params.append('nonce', allAjax.nonce);
            params.append('email', this.email);

            

            axios.post(allAjax.ajaxurl, params)
              .then((response) => {
                  
                  this.UsserZakaz  = response.data; 
                  console.log(this.UsserZakaz);
              })
              .catch((error)  => {
                alert("???? ?????????? ?????????????????? ???????????? ?????????????????? ????????????!");
              });
        }
    }
});

let cabinet = new Vue({
    el:"#main_cabinet",
    
    data:{
        state:"",            
        showAutorize:true,
        showRegistration:false,
        showPassRec:false,
        showKabinet:false,
        showStat:false,
    },
    
    created: function() {
        eventBus.$on("chenge-state", (state)=>{
            this.chengeState(state); 
        });
        


        window.addEventListener('focus', this.updateState);
        this.updateState();
    },


    methods:{

        updateState() {
            if (getCookie("agriautorise") != undefined) {
              let state = localStorage.getItem('kabinetstate');  
              if (state == undefined)
                this.chengeState("kabinet");
              else  
                this.chengeState(state);

            } else {
                this.chengeState("autorization");
                
            }
        },

        chengeState(state) {
            console.log(state);
            this.showAutorize = false;
            this.showRegistration = false;
            this.showPassRec = false;
            this.showKabinet = false;
            this.showStat = false;

            localStorage.removeItem('kabinetstate'); 

            if (state == "register") { this.showRegistration = true; localStorage.setItem('kabinetstate', "register"); }
            if (state == "autorization") { this.showAutorize = true; localStorage.setItem('kabinetstate', "autorization"); }
            if (state == "passrec") { this.showPassRec = true; localStorage.setItem('kabinetstate', "passrec"); }
            if (state == "kabinet") { this.showKabinet = true; localStorage.setItem('kabinetstate', "kabinet"); }
            if (state == "stat") { this.showStat = true; localStorage.setItem('kabinetstate', "stat"); }
        }
    }
});