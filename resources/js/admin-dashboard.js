import './bootstrap';
import { createApp } from 'vue';
import AdminDashboard from './components/AdminDashboard.vue';

const mountEl = document.getElementById('admin-dashboard');

if (mountEl) {
    const {
        totalUsers = '0',
        totalSearches = '0',
        activeTimetable = '',
        conflictsDetected = '0',
    } = mountEl.dataset;

    const app = createApp(AdminDashboard, {
        totalUsers: Number(totalUsers),
        totalSearches: Number(totalSearches),
        activeTimetable: activeTimetable || 'None',
        conflictsDetected: Number(conflictsDetected),
    });

    app.mount(mountEl);
}
