<template>
    <transition name="fade">
        <div class="modal" v-if="show">
            <div class="modal__backdrop" @click="closeModal()"/>

            <div class="modal-content">
                <div class="modal__header">
                    <span type="button" class="close" @click="closeModal()">&times
                    </span>
                    <slot name="header"/>
                </div>

                <div class="modal__body">
                    <slot name="body"/>
                </div>

                <div class="modal__footer">
                    <slot name="footer"/>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    name: "Modal",
    data() {
        return {
            show: false
        };
    },

    methods: {
        closeModal() {
            this.show = false;
            document.querySelector("body").classList.remove("overflow-hidden");
        },
        openModal() {
            this.show = true;
            document.querySelector("body").classList.add("overflow-hidden");
        }
    }
};
</script>

