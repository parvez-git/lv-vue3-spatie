import { ref } from 'vue'

export function openDialogBox() {

    let modalVisible = ref(false);
    let modalID = ref(null);
    let modalTitle = ref('');

    function openModal(category) {
        modalVisible.value = true
        modalID.value = category.id
        modalTitle.value = 'Are you sure? You want to delete: <br/><span class="px-2 py-1 text-base text-dark font-semibold bg-red-200 rounded-lg">' + category.name + '</span> ?'
    }

    function closeModal() {
        modalVisible.value = false
        modalID.value = null
        modalTitle.value = ''
    }

    return {
        modalVisible,
        modalID,
        modalTitle,
        openModal,
        closeModal
    }
}