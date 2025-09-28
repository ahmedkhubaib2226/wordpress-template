import { persist } from "zustand/middleware";
import { create } from "zustand";

const stores = [];

const zustand = {
    persist,
    create,
    stores
}

window.zustand = zustand;