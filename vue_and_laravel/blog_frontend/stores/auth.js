import {defineStore} from "pinia";
import axios from 'axios';

export const useAuthStore=defineStore("auth",{
    state:()=>({
        authUser:null,
    }),
    getters:{
        user:(state)=>(state.authUser),
    },
    actions:{
        async get_token(){
            await axios.get("/sanctum/csrf-cookie");
        },
        async getUser(){
            this.get_token();
            let domain = await axios.get("../../data/url.txt");
            const data =  await axios.get(domain.data + 'user')
            this.authUser=data.data
        }  }
})