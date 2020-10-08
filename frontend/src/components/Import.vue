<template>

  <v-app>  

    <!-- <div v-if="message =='Not Created'">

    </div> -->
   
 
   <v-file-input accept=".csv" style="margin-top: 10%; width:50%;margin-left:25%"  enctype="multipart/form-data" type="file" class="form-control" :class="{ ' is-invalid' : error.message }" 
      id="input-file-import" name="file_import" ref="import_file"  @change="onFileChange" label="File input"></v-file-input> 

    <v-btn type="submit" color="success" style="margin-top: 10px; width:50%;margin-left:25%" @click="proceedAction" enctype="multipart/form-data">submit</v-btn> 
<!-- @click="proceedAction" -->
</v-app>
</template>


<script>
import axios from "axios";
  export default {
    name: "Import",
     data() {
        //  console.log('vfhd')
        return {
          error: '',
          import_file: '',
          user_id:[],
          title:[],
          body:[]
        }
      },
      methods: {
         onFileChange(e) {
           console.log(e)
          //  console.log(e.target.files)
             

        this.import_file = e;
        // this.createInput(e)
       
    },

    createInput(file) {
      let promise = new Promise((resolve) => {
        var reader = new FileReader();
        var vm = this;
        var user_id = [];
        var title = [];
        var body = [];
        reader.onload = e => {
          resolve((vm.fileinput = reader.result));
          let lines = (e.target.result.split(/\r\n|\n/));
          for(let i=0;i<lines.length;i++){
            user_id.push(lines[i].split(',')[0]);
            title.push(lines[i].split(',')[1]);
            body.push(lines[i].split(',')[2])

          }

        // console.log(user_id);
        // console.log(title);
        // console.log(body);

        const bodyFormData = new FormData();

        user_id.forEach((item) => {
          bodyFormData.append('user_id[]', item);
        });

        title.forEach((item) => {
          bodyFormData.append('title[]', item);
        });

        body.forEach((item) => {
          bodyFormData.append('body[]', item);
        });
          
        console.log(bodyFormData);
        };

        axios.post('http://127.0.0.1:8000/api/posts/', this.bodyFormData)
            .then(response => {
                if(response.status === 200) {
                  console.log(response);
                }
            })
            .catch(error => {
              console.log(error)
            }
            );
        
        reader.readAsText(file);
      });

      promise.then(
        result => {
          /* handle a successful result */
          console.log(result)
          // this.processData(this.fileinput);
        },
        error => {
          /* handle an error */ 
          console.log(error);
        }
      );
    },

 

    proceedAction() {
        console.log('fbhb')
        let formData = new FormData();
        formData.append('import_file', this.import_file);
        // console.log(formData)

          axios.post('http://127.0.0.1:8000/api/posts/import', formData, {
              headers: { 'content-type': 'multipart/form-data' }
            })
            .then(response => {
                if(response.status === 200) {
                  
                  // this.error.push(response.data);
                  
                  console.log(response.data.message);
                  this.error = response.data.message;
                }
            })
            .catch(error => {
            
                this.uploading = false
                this.error = error.response.data
                console.log('check error: ', this.error)
            });

            console.log('Hey')
            // console.log(this.error)
            // console.log(this.error)
            

        
            this.$router.push("/");

        },
      }
  }
</script>
