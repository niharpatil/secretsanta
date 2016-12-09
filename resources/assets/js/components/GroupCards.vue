<template>
<div class="row">
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
    </div>
   </li>
</ul>
<div class="col s12">
  <p class="flow-text">Looks like you have no secret santa groups...Why don't you make one!</p>
</div>

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
      }
    },
    methods : {
      fetchGroupData(){
        this.$http.get('/api/group-data/'+this.userId).then(function(response){
          for(i = 0; i < response.data.length; i++){
            this.groups.push({
              'group_name':response.data[i].group_name,
              'members':response.data[i].members
            });
          }
        });
      },
    },
    mounted : function(){
      this.fetchGroupData();
    }
  }
</script>