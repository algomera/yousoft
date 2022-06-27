<template>
    <div class="absolute flex items-center justify-center inset-0 bg-black/70">
        <div
            class="w-full max-w-xl bg-white rounded p-8 flex flex-col items-center justify-center space-y-5"
        >
            <atom-spinner
                :animation-duration="1000"
                :size="120"
                color="#61a4d7"
            />
            <div class="text-center space-y-3">
                <h3 class="text-2xl font-semibold">Stiamo generando una nuova pratica.</h3>
                <h5 class="text-lg">Non chiudere la schermata 😁</h5>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "PracticeLoader",
};
</script>

<style>
.centered {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 999;
}
</style>
