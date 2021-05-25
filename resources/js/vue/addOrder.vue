<template>
    <div>
        <h2>4. Podsumowanie</h2>
        <div>
            <table v-for="product in products">
            <tr>
                <td>{{product.name}}</td>
                <td class="prize">{{product.price}} zł</td>
            </tr>
                <tr>
                    <td>ilość: 1</td>
                </tr>
            </table>
            <div style="padding: 20px">

            <div class="line"></div>
            czy wykorzystano kod rabatowy?
                <p class="prize" v-if="discountAmount!==1"> tak</p>
            <p class="prize" v-if="discountAmount===1"> nie</p>
            <div class="line"></div>
            Cena dostawy: <p class="prize">{{deliveryPrice}} zł</p>
            <div class="line"></div>
            Cena końcowa: <p class="prize">{{finalPrice}} zł</p>
            <div class="line"></div>
            </div>
            <textarea rows="5" placeholder="komentarz">

            </textarea>
        </div>
        <div>
            <label class="container">
                <input v-model="rulesCheck" type="checkbox"> Zapoznałem się z regulaminem zakupów
                <span class="checkmark" ></span>
            </label>
            <label class="container">
                <input type="checkbox"> Zapisz się, aby otrzymywać newsletter
                <span class="checkmark" ></span>
            </label>
            <button @click="addOrder()">Potwierdź zakup</button>
        </div>
    </div>
</template>

<script>
export default {
    props: ['products', 'discountAmount','deliveryPrice', 'finalPrice'],
    watch: {//cena zhardkodowana
        discountAmount: function () {
            let new_price = (( Number(120) +  Number(this.deliveryPrice)) * this.discountAmount).toFixed(2);
            this.$emit("priceChange",new_price )
        },
        deliveryPrice: function (){
            let new_price = (( Number(120) + Number(this.deliveryPrice)) * this.discountAmount).toFixed(2);
            parseFloat(new_price).toFixed(2);
            this.$emit("priceChange",new_price );
        }
    },
    data(){
        return{
            rulesCheck: false
        }
    },
    methods:{
        addOrder(){
            if(this.rulesCheck) {
                this.$emit("newAccount")

            } else{
                alert("potwierdź regulanim")
            }
        }
    }
}
</script>
