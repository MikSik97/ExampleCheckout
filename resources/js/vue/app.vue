<template>

    <div class ="checkoutContainer">
        <div class="checkoutElement">
            <registration-form
                ref="registrationForm"
                @newUser="userId=$event"
                @newAddress="addressId=$event"/>
        </div>
        <div class="checkoutElement">
            <select-delivery
            :deliveries="deliveries"
            :payments="payments"
            :paid="paid"
            :deliveryId="deliveryId"
            @paid="paid=$event"/>

            <select-discount :discountAmount="discountAmount" @changeDiscount="discountAmount = $event"/>
        </div>
        <div class="checkoutElement">
            <add-order
                :products="products"
                :discountAmount="discountAmount"
                :finalPrice="finalPrice"
            @newAccount="addOrder()"
            @priceChange="finalPrice=$event"/>
        </div>
    </div>

</template>

<script>

    import selectDelivery from "./selectDelivery";
    import selectDiscount from "./selectDiscount";
    import registrationForm from "./registrationForm";
    import addOrder from "./addOrder";

    export default {
        components:{
            registrationForm,
            selectDelivery,
            selectDiscount,
            addOrder,
        },
        data: function (){
            return{
                deliveries: [],
                payments: [],
                products:[],
                discountAmount: 1,
                finalPrice: 120,
                userId: 1,
                addressId: 1,
                deliveryId: null,
                paid: null,
            }
        },
        methods: {
            getDeliveries() {
                axios.get('/api/deliveries')
                    .then(response => {
                        this.deliveries = response.data
                    })
                    .catch(error => {
                        console.log(error.response.data);
                    })
            },
            getPayments(){
                axios.get('/api/payments')
                    .then( response =>{
                        this.payments = response.data
                    })
                    .catch( error =>{
                        console.log(error.response.data);
                    })
            },
            getCart(){
                axios.get('/api/cart')
                    .then(response=>(
                        this.products = response.data
                    ))
                    .catch( error =>{
                        console.log(error.response.data);
                    })
            },
            addOrder(){
               this.$refs.registrationForm.submitForm();
               let number = this.makeid();
               if(this.paid === null){
                   alert("wybierz płatność")
                   return;
               }
                axios.post('/api/new_order',{
                    'user_id': this.userId,
                    'order_number': number,
                    'address_id': this.addressId,
                    'price' : this.finalPrice,
                    'paid': this.paid,
                }).then(response=>(
                    alert("Dziękujemy za zamówienie twój numer zamówienia to:"+ number)
                )).catch( error =>{
                    console.log(error.response.data);
                })
            },
            makeid() {
                var result           = [];
                var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                var charactersLength = characters.length;
                for ( var i = 0; i < 16; i++ ) {
                    result.push(characters.charAt(Math.floor(Math.random() *
                        charactersLength)));
                }
                return result.join('');
            }
        },
            created() {
            this.getDeliveries();
            this.getPayments();
            this.getCart();

        }
    }
</script>
<style>
@import '../../css/app.css';
@import "../../css/checkboxRadio.css";
@import "../../css/modal.css";

</style>
