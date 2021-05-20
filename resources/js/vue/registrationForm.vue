<template>
    <body>
        <div>
            <h2><i class="fa fa-address-card-o"></i> 1. Twoje dane</h2>
            <button class="loginButton" @click="$refs.loginModal.openModal()">Zaloguj</button>
            <p>Masz już konto? kliknij aby się zalogować?</p>
            <modal ref="loginModal">
                <template v-slot:header>
                    <h1>Zaloguj:</h1>
                </template>
                <template v-slot:body>
                    <input type="text" placeholder="email">
                    <input type="password" placeholder="hasło">
                </template>

                <template v-slot:footer>
                    <div>
                        <button class="loginButton" @click="$refs.loginModal.closeModal()">Zaloguj</button>
                    </div>
                </template>
            </modal>
        </div>

        <div id="selector">
                <label class="container">
                    <input type="checkbox" v-model="checked">Stwórz konto
                    <span class="checkmark" ></span>
                </label>
            <div id="app-container" v-if="checked">
                <form id="reg_form" method="post" action="/api/register">
                    <input  v-model="fields.email" type="email" placeholder="email" required>
                    <input v-model="fields.name" type="text" placeholder="imię" required>
                    <input id="password" v-model="fields.password" type="password" placeholder="hasło" required>
                    <input id="confirm_password" type="password" placeholder=" potwierdź hasło" required>
                    <span id='message'></span>
                    <input v-model="fields.surname" type="text" placeholder="nazwisko" required>
                    <input v-model="fields.street" type="text" placeholder="ulica" required>
                    <input v-model="fields.number" type="text" placeholder="numer mieszkania">
                    <input v-model="fields.postalCode" type="text" placeholder="kod pocztowy" required>
                    <input v-model="fields.city" type="text" placeholder="miasto" required>
                    <input v-model="fields.country" type="text" placeholder="kraj" required>
                    <input v-model="fields.phone" type="tel" placeholder="telefon" pattern="[0-9]{9}"  required>
                </form>
            </div>
        </div>
    </body>
</template>

<script>
import Modal from './modal'

export default {
    props:['userId','addressId'],
    components: {
        Modal
    },
    data(){
        return{
            checked: false,
            fields:{
                email:'',
                name:'',
                surname:'',
                password:'',
                street:'',
                postalCode:'',
                city:'',
                country:'',
                phone:'',
            }
        }
    },
    methods:{
        submitForm(){
            if(this.checked) {
                if(!document.getElementById('reg_form').checkValidity()){
                    console.log("coś nie gra")
                }else{
                    axios.post('api/registration', {
                        fields: this.fields
                    })
                        .then(response =>{
                            var user = response.data[0];
                            var address = response.data[1];
                            this.$emit("newUser", user);
                            this.$emit("newAddress", address);
                        }
                    ).catch( error =>{
                        console.log(error.response.data)
                    })
                }
            }
        },
    }
}
</script>
