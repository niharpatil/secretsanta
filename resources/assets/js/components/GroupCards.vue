<template>
<div class="row">
 <!-- Modal Trigger -->
  <ul v-if="groups.length">
  
  <li v-for="(group,index) in groups">
    <div class="card red lighten-2">
    <div class="card-content white-text">
      <span class="card-title">{{group.group_name}}</span>
      <p>When a member confirms their email, their name will show up</p>
      <div class="row">
        <div class="col s12">
             <table>
                <thead>
                  <tr>
                      <th data-field="name">Name</th>
                      <th data-field="confirmed">Confirmed?</th>
                      <th data-field="email">E-mail</th>
                      <th>
                          <a class="btn-floating btn-medium red" href="#modal1">
                              <i class="large material-icons">mode_edit</i>
                          </a>
                      </th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="member in group.members">
                    <td>{{member.name}}</td>
                    <td v-if="member.confirmed === 1">Yep!</td>
                    <td v-else>Not yet...</td>
                    <td>{{member.email}}</td>
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
        are_groups:false
      }
    },
    methods : {
      fetchGroupData(){
        this.$http.get('/api/group-data/'+this.userId).then(function(response){
          for(i = 0; i < response.data.length; i++){
            console.log(response.data[i].id);
            this.groups.push({
              'group_name':response.data[i].group_name,
              'members':response.data[i].members,
              'id':response.data[i].id
            });
          if(this.groups.length > 0){
            this.are_groups = true;
          }
          }
        });
      },
    },
    beforeMount:function(){

    },
    mounted : function(){
      this.fetchGroupData();
    }
  }
</script>