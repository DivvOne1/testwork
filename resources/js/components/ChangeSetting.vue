<template>
    <div>
        <input v-model="userId" placeholder="Введите ID пользователя" />
        <input v-model="newCode" placeholder="Введите новый код" />
        <select v-model="method">
            <option value="sms">SMS</option>
            <option value="email">Email</option>
            <option value="telegram">Telegram</option>
        </select>
        <button @click="updateUserCode">Обновить код</button>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            userId: '',
            newCode: '',
            method: 'sms',
        };
    },
    methods: {
        async updateUserCode() {
            try {
                const response = await axios.post('http://latests/api/settings/change', {
                    user_id: this.userId,
                    new_code: this.newCode,
                    method: this.method
                });

                alert(response.data.message);
            } catch (error) {
                console.error('Ошибка при обновлении кода:', error);
                alert('Произошла ошибка при обновлении кода.');
            }
        }
    }
};
</script>


<style scoped>
.change-setting {
    display: flex;
    flex-direction: column;
    max-width: 400px;
    margin: 0 auto;
}

input, select {
    margin-bottom: 10px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    padding: 8px;
    color: white;
    background-color: #007bff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

.error {
    color: red;
    margin-top: 10px;
}
</style>
