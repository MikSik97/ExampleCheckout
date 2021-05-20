<template>
    <div>
        <button class="discountButton" @click="$refs.discountModal.openModal()">Dodaj kod rabatowy</button>
        <modal ref="discountModal">
            <template v-slot:header>
                <h1>Wpisz kod rabatowy:</h1>
            </template>

            <template v-slot:body>
                <input type="text" v-model="discount.name">
               </template>

            <template v-slot:footer>
                <div>
                    <button class="loginButton" @click="$refs.discountModal.closeModal(); checkCode();">Dodaj</button>
                </div>
            </template>
        </modal>
    </div>
</template>

<script>
import Modal from './modal'
export default {
    props: ['discountAmount'],
    components: {
        Modal
    },
    data : function(){
        return {
            discount:{
                name:'',
            },
            dscA:1
        }
    },
    methods: {
       checkCode(){
            if (this.discount.name===''){
                return;
            }
            if (this.discountAmount !==1){
                alert("juz wykorzystano kod!")
                return;
            }
            axios.post('api/discount',{
                discount: this.discount
            })
            .then(response => {
                if(response.data[1]===2){
                    alert("podany kod jest nieaktywny")
                }
                if(response.data[1]===3){
                    alert("podany kod jest błędny")
                }
                this.dscA = response.data[0]
                this.$emit('changeDiscount', this.dscA)
            })
                .catch( error =>{
                console.log(error.response.data);
                })
        }
    }
}

</script>
