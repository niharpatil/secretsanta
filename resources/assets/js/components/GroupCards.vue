<template>
<div class="row">
  <div id="are_you_sure" class="modal" style="z-index:10;">
    <div class="modal-content">
        <h4 style="color:white;">Are you sure?</h4>
        <p style="color:white;">Members that haven't confirmed won't be in your arrangement</p>
      </div>
      <div class="modal-footer">
        <a @click="close_modal" class="modal-action modal-close waves-effect waves-green btn-flat">Nope, nevermind</a>
        <a @click="distribute" class=" modal-action modal-close waves-effect waves-green btn-flat">Yeah, let's do it</a>
      </div>
  </div>

  <ul v-if="groups.length">
  <li v-for="(group,index) in groups">
    <div class="card red lighten-2">
    <div class="card-content white-text">
      <span class="card-title">{{group.group_name}}  </span>
      <p v-if="group.arrangements_sent">Arrangements have already been sent!</p>
      <a v-if="group.arrangements_sent" class="waves-effect waves-light btn" @click="confirmLock(group.id)">Send Again<i class="material-icons right">send</i></a>
      <a v-else class="waves-effect waves-light btn" @click="confirmLock(group.id)">Send Arrangements<i class="material-icons right">send</i></a>
      <p>When a member confirms their email, their name will show up</p>
      <div class="row">
        <div class="col s12">
             <table>
                <thead>
                  <tr>
                      <th data-field="name">Name</th>
                      <th data-field="confirmed">Confirmed?</th>
                      <th data-field="email">E-mail</th>
                      <th>Send Confirmation</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="member in group.members">
                    <td>{{member.name}}</td>
                    <td v-if="member.confirmed === true">Yep!</td>
                    <td v-else>Not yet...</td>
                    <td>{{member.email}}</td>
                    <td>
                        <a v-if="member.confirmed !== true" class="waves-effect waves-light btn" name="send_confirm" @click="sendConfirmation(member.confirmation)">
                         <i class="material-icons right">send</i>
                        </a>
                    </td>
                  </tr>
                </tbody>
              </table>
        </div>
      </div>
    </div>
    <div class="card-action">
      <create-group :user-id="this.userId" :group-id="group.id"></create-group>
    </div>
    </div>
   </li>
</ul>
<ul v-if="!are_groups">
    <li> <p style="color:white;" class="flow-text">Looks like you have no secret santa groups...Why don't you make one!</p>
</li>
  </ul>
</div>


</template>

<script>
  export default {
    props:{
      userId: Number
    },
    data() {
      return {
        groups:[],
        are_groups:false,
        group_id_to_distribute:Number
      }
    },
    methods : {
      fetchGroupData(){
        this.$http.get('/api/group-data/'+this.userId).then(function(response){
          for(var i = 0; i < response.data.length; i++){
            console.log(response.data[i].id);
            this.groups.push({
              'group_name':response.data[i].group_name,
              'members':response.data[i].members,
              'id':response.data[i].id,
              'arrangements_sent':response.data[i].arrangements_sent
            });
          if(this.groups.length > 0){
            this.are_groups = true;
          }
          }
        });
      },
      sendConfirmation(s){
        console.log(s);
        this.$http.get('/api/send-invite/'+ this.userId+'/'+s).then(function(response){
          Materialize.toast('Confirmation Sent!', 4000);
          console.log('confirmation sent');
        })
      },
      confirmLock(group_id){
        this.group_id_to_distribute = group_id;
        $("#are_you_sure").modal();
      },
      distribute(){
          $("#are_you_sure").click();
          this.$http.post('/api/distribute/'+this.group_id_to_distribute).then(function(response){
            Materialize.toast(response.data, 4000);
          }).catch(function(response){
            console.log(response.data);
          });
      },
      close_modal(){
        $("#are_you_sure").click();
      }
    },
    beforeMount:function(){

    },
    mounted : function(){
      this.fetchGroupData();
    }
  }
</script>