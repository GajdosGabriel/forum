<template>
    <div @click.once="addLike"><span v-if="!show" style="cursor: pointer" title="Pridajte svoj hlas komentáru!">{{ favorites }} Pridať hlas</span>
        <transition name="bounce">
            <!--<button v-show="show" class="btn btn-default btn-xs ">{{ favorites }} Hlas pridaný</button>-->
            <div v-show="show" >{{ favorites }} Hlas pridaný</div>
        </transition>

    </div>
</template>

<script>
    export default {
        props: ['data'],
        data: function () {
            return {
                favorites: this.data.favoritesCount,
                show: false,
                isFavorited: this.data.isFavoritedjson

            }
        },

        methods: {
            addLike: function () {
                axios.post('/replies/' + this.data.id + '/favorites');
                this.show = true;
                this.favorites++;
            }
        }
    }
</script>

<style>
    .bounce-enter-active {
        animation: bounce-in .5s;
    }
    .bounce-leave-active {
        animation: bounce-in .5s reverse;
    }
    @keyframes bounce-in {
        0% {
            transform: scale(0);
        }
        50% {
            transform: scale(1.5);
        }
        100% {
            transform: scale(1);
        }
    }
</style>