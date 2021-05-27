

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

let to_form = new Vue({
    el:"#request-section",
    
    data:{
        header_text: "Заполните заявку на Техосмотр",
        fio: "",
        fioNoCheced:false,
        phone: "",
        phoneNoCheced:false,
        mail: "",
        mailNoCheced:false,
        city: "",
        cityNoCheced:false,
        kategory: "",
        kategoryNoCheced:false,
        data: "", 
        dataNoCheced:false,
        time: "", 
        timeNoCheced:false,
        punct: "",
        punctNoCheced:false,
        price: "",

        totalNoCheced:false,
        spinerStart:false,

        timetable: {
          "A": [
            "9:00", 
            "9:15",
            "9:30",
            "9:45",
            "10:00",
            "10:15",
            "10:30",
            "10:45",
            "11:00",
            "11:15",
            "11:30",
            "11:45",
            "12:00",
            "12:15",
            "12:30",
            "12:45",
            "13:00",
            "13:15",
            "13:30",
            "13:45",
            "14:00",
            "14:15",
            "14:30",
            "14:45",
            "15:00",
            "15:15",
            "15:30",
            "15:45",
            "16:00",
            "16:15",
            "16:30",
            "16:45",
            "17:00",
            "17:15",
            "17:30",
            "17:45"
          ],

          "B":[
            "9:00",
            "9:30",
            "10:00",
            "10:30",
            "11:00",
            "11:30",
            "12:00",
            "12:30",
            "13:00",
            "14:00",
            "14:30",
            "15:00",
            "15:30",
            "16:00",
            "16:30",
            "17:00",
            "17:30"
          ],

          "C": [
            "9:00",
            "10:15",
            "11:00",
            "12:15",
            "13:00",
            "14:15",
            "15:00",
            "16:15",
            "17:00"
          ],
          "D": [
            "9:00",
            "10:15",
            "11:30",
            "12:45",
            "14:00",
            "15:15",
            "16:30",
          ]
        },


        feildInfo: {
          "Курск": {
            city:"Курск",
            categories: [
              "Категория L - Мототранспортные средства",
              "Категория M1 - не более 8 мест для сидения",
              "Категория M2 - не более 8 мест и max 5т",
              "Категория M3 - более 8 мест и более 5т",
              "Категория N1 - не более 3,5т",
              "Категория N2 - свыше 3,5 т, но не более 12т",
              "Категория N3 - более 12т",
              "Категория O1 - Прицепы, маx масса не более 0,75т",
              "Категория O2 - Прицепы, маx масса от 0,75т до 3,5т",
              "Категория O3 - Прицепы, маx масса от 3,5т до 10т",
              "Категория O4 - Прицепы, маx масса более 10т",
            ],

            pricing: {
              "Категория L - Мототранспортные средства": [1500],
              "Категория M1 - не более 8 мест для сидения": [1500],
              "Категория M2 - не более 8 мест и max 5т": [3200],
              "Категория M3 - более 8 мест и более 5т": [3500],
              "Категория N1 - не более 3,5т": [1500],
              "Категория N2 - свыше 3,5 т, но не более 12т": [2200],
              "Категория N3 - более 12т": [2400],
              "Категория O1 - Прицепы, маx масса не более 0,75т": [1500],
              "Категория O2 - Прицепы, маx масса от 0,75т до 3,5т": [1500],
              "Категория O3 - Прицепы, маx масса от 3,5т до 10т": [1500],
              "Категория O4 - Прицепы, маx масса более 10т": [1500]
            },

            puncts: {
              "Категория L - Мототранспортные средства": [
                "ООО «ТЕХСЕРВИЗАВТО» Курск, пр.Магистральный 18з - L, M1 M2 M3 N1 N2 N3 O1 O2 O3 O4",
                "ООО АвтоПрофи Курск, пркт Клыкова, д111 - L, M1, N1"
              ],
              
              "Категория M1 - не более 8 мест для сидения": [
                "ООО «ТЕХАВТОСЕРВИС» Курск, пр-кт.Кулакова, д.150 - M1 N1",
                "ООО «ТЕХСЕРВИЗАВТО» Курск, ул.Комарова, д16 - М1 N1", 
                "ООО «ТЕХСЕРВИЗАВТО» Курск, пр.Магистральный 18з - L, M1 M2 M3 N1 N2 N3 O1 O2 O3 O4",
                "Ип Захаров СН Курск, 3-й Краснополянский пер. 6а - M1 N1",
                "ООО АвтоПрофи Курск, пркт Клыкова, д111 - L, M1, N1"
              ],

              "Категория M2 - не более 8 мест и max 5т": [
                "ООО «ТЕХСЕРВИЗАВТО» Курск, пр.Магистральный 18з - L, M1 M2 M3 N1 N2 N3 O1 O2 O3 O4",
              ],
              "Категория M3 - более 8 мест и более 5т": [
                "ООО «ТЕХСЕРВИЗАВТО» Курск, пр.Магистральный 18з - L, M1 M2 M3 N1 N2 N3 O1 O2 O3 O4",
              ],
              "Категория N1 - не более 3,5т": [
                "ООО «ТЕХАВТОСЕРВИС» Курск, пр-кт.Кулакова, д.150 - M1 N1",
                "ООО «ТЕХСЕРВИЗАВТО» Курск, ул.Комарова, д16 - М1 N1", 
                "ООО «ТЕХСЕРВИЗАВТО» Курск, пр.Магистральный 18з - L, M1 M2 M3 N1 N2 N3 O1 O2 O3 O4",
                "Ип Захаров СН Курск, 3-й Краснополянский пер. 6а - M1 N1",
                "ООО АвтоПрофи Курск, пркт Клыкова, д111 - L, M1, N1"
              ],
              "Категория N2 - свыше 3,5 т, но не более 12т": [
                "ООО «ТЕХСЕРВИЗАВТО» Курск, пр.Магистральный 18з - L, M1 M2 M3 N1 N2 N3 O1 O2 O3 O4",
              ],
              "Категория N3 - более 12т": [
                "ООО «ТЕХСЕРВИЗАВТО» Курск, пр.Магистральный 18з - L, M1 M2 M3 N1 N2 N3 O1 O2 O3 O4",
              ],
              "Категория O1 - Прицепы, маx масса не более 0,75т": [
                "ООО «ТЕХСЕРВИЗАВТО» Курск, пр.Магистральный 18з - L, M1 M2 M3 N1 N2 N3 O1 O2 O3 O4",
              ],
              "Категория O2 - Прицепы, маx масса от 0,75т до 3,5т": [
                "ООО «ТЕХСЕРВИЗАВТО» Курск, пр.Магистральный 18з - L, M1 M2 M3 N1 N2 N3 O1 O2 O3 O4",
              ],
              "Категория O3 - Прицепы, маx масса от 3,5т до 10т": [
                "ООО «ТЕХСЕРВИЗАВТО» Курск, пр.Магистральный 18з - L, M1 M2 M3 N1 N2 N3 O1 O2 O3 O4",
              ],
              "Категория O4 - Прицепы, маx масса более 10т": [
                "ООО «ТЕХСЕРВИЗАВТО» Курск, пр.Магистральный 18з - L, M1 M2 M3 N1 N2 N3 O1 O2 O3 O4",
              ]
            }
          },
          "Воронеж": {
            city:"Воронеж",
            categories: [
              "Категория M1 - не более 8 мест для сидения",
            ],

            pricing: {
              "Категория M1 - не более 8 мест для сидения": [1500],
            },

            puncts: {
              "Категория M1 - не более 8 мест для сидения":[
                "ООО АвтоПрофи Воронеж, пр-кт Патриотов 45б - М1"
              ]
            }
          },
          

        }
    },
    computed: {
      categoryTsList: function () {
        if (this.feildInfo[this.city] == undefined)
        return [];
        else
        return this.feildInfo[this.city].categories;
      },

      punktToList: function () {
        
        if (this.feildInfo[this.city] == undefined)  return [];
        if (this.feildInfo[this.city].puncts[this.kategory] == undefined)  return [];
       
        return this.feildInfo[this.city].puncts[this.kategory];
      },

      timeTableSelect: function() {
        if (
          (this.kategory == "Категория M1 - не более 8 мест для сидения")||
          (this.kategory == "Категория M2 - не более 8 мест и max 5т")||
          (this.kategory == "Категория M3 - более 8 мест и более 5т")
        ) return this.timetable["B"];

        if (
          (this.kategory == "Категория N1 - не более 3,5т")||
          (this.kategory == "Категория N2 - свыше 3,5 т, но не более 12т")||
          (this.kategory == "Категория N3 - более 12т")
        ) return this.timetable["C"];

        if (
          (this.kategory == "Категория O1 - Прицепы, маx масса не более 0,75т")||
          (this.kategory == "Категория O3 - Прицепы, маx масса от 3,5т до 10т")||
          (this.kategory == "Категория O4 - Прицепы, маx масса более 10т") ||
          (this.kategory == "Категория O2 - Прицепы, маx масса от 0,75т до 3,5т")
        ) return this.timetable["D"];
        
        return this.timetable["A"];

        
      }
    },

    created: function() {
       
    },


    methods:{
        setToPrice() {
          if (this.feildInfo[this.city] == undefined)  return ;
          if (this.feildInfo[this.city].pricing[this.kategory] == undefined)  return;
          
          this.time = "";

          this.price = this.feildInfo[this.city].pricing[this.kategory];
        },

        citySelect() {
           this.kategory = "";
           this.punct = "";
        },

       

        sendForm() {
            this.totalNoCheced = false;
            

            if (this.fio == "") {this.fioNoCheced = true; this.totalNoCheced = true;}
            if (this.phone == "") {this.phoneNoCheced = true; this.totalNoCheced = true;}
            if (this.mail == "") {this.mailNoCheced = true;  this.totalNoCheced = true;}
            if (this.city == "") {this.cityNoCheced = true;  this.totalNoCheced = true;}
            if (this.kategory == "") {this.kategoryNoCheced = true;  this.totalNoCheced = true;}
            if (this.data == "") {this.dataNoCheced = true;  this.totalNoCheced = true;}
            if (this.time == "") {this.timeNoCheced = true;  this.totalNoCheced = true;}
            if (this.punct == "") {this.punctNoCheced = true;  this.totalNoCheced = true;}
          
            

            if (!this.totalNoCheced) {
                this.spinerStart = true;

                var params = new URLSearchParams();
                params.append('action', 'send_to_new');
                params.append('nonce', allAjax.nonce);
               
                params.append('name', this.fio);
                params.append('tel', this.phone);
                params.append('email', this.mail);
                params.append('city', this.city);
                params.append('kategory', this.kategory);
                params.append('data', this.data);
                params.append('time', this.time);
                params.append('punct', this.punct);
                params.append('price', this.price);
                params.append('agentphone', localStorage.getItem('phone'));
                params.append('agentname', localStorage.getItem('name'));
                params.append('agentcompany', localStorage.getItem('company_name'));
                params.append('agentinn', localStorage.getItem('inn'));
    
                axios.post(allAjax.ajaxurl, params)
                  .then( (response) => {
                    window.location.href = toThencsPageUrl+"?n="+this.fio+"&t="+this.phone+"&ml="+this.mail+"&sm="+this.price+"&zn="+response.data.zn;
                    this.spinerStart = false;
                  })
                  .catch((error) => {
                    console.log(error);
                    alert(error);
                    this.spinerStart = false;
                  }); 
            } 
        }
    },


});