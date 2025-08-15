<template>
  <div class="min-h-screen bg-black text-gray-100">
    <!-- Header -->
    <header class="bg-gray-900 border-b border-gray-800 p-8 text-center">
      <div class="relative z-10">
        <h1 class="text-5xl font-bold text-white mb-2">🛠️ Admin Dashboard</h1>
        <p class="text-xl text-gray-400">Lester Ag Padul's Portfolio Management</p>
      </div>
    </header>

    <div class="container mx-auto px-6 py-8 space-y-8">
      <div v-if="error" class="bg-red-900 border border-red-700 text-red-200 px-4 py-3 rounded-lg">
        <strong>Error:</strong> {{ error }}
      </div>

      <form @submit="handleSubmit" class="space-y-8">
        
        <!-- About Section -->
        <section class="group">
          <div class="bg-gray-900 border border-gray-800 rounded-lg p-8 transition-all duration-300 hover:border-teal-500/50">
            <div class="flex items-center gap-3 mb-6">
              <div class="w-12 h-12 bg-teal-500 rounded-lg flex items-center justify-center">
                <span class="text-2xl text-black">ℹ️</span>
              </div>
              <h2 class="text-3xl font-bold text-teal-400">About Me</h2>
            </div>
            
            <div class="relative">
              <div v-if="loading.about" class="w-full p-4 bg-gray-800 border border-gray-700 rounded-lg text-center text-gray-400">
                Loading about data...
              </div>
              <textarea
                v-else
                v-model="form.description"
                class="w-full p-4 bg-gray-800 border border-gray-700 rounded-lg text-gray-200 placeholder-gray-500 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300 resize-none"
                rows="5"
                placeholder="Tell us about yourself..."
              ></textarea>
            </div>
          </div>
        </section>

        <!-- Experience Section -->
        <section class="group">
          <div class="bg-gray-900 border border-gray-800 rounded-lg p-8 transition-all duration-300 hover:border-teal-500/50">
            <div class="flex items-center gap-3 mb-6">
              <div class="w-12 h-12 bg-teal-500 rounded-lg flex items-center justify-center">
                <span class="text-2xl text-black">💼</span>
              </div>
              <h2 class="text-3xl font-bold text-teal-400">Experience</h2>
            </div>

            <div class="space-y-6">
              <div v-if="loading.experiences" class="text-center text-gray-400">
                Loading experiences...
              </div>
              <div v-else>
                <div v-for="experience in experiences" :key="experience.id" class="bg-gray-800 border border-gray-700 rounded-lg p-6 transition-all duration-300 hover:border-gray-600">
                  <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
                    <div class="space-y-4">
                      <input 
                        :value="experience.title"
                        readonly
                        class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 placeholder-gray-500" 
                      />
                      <input 
                        :value="experience.company"
                        readonly
                        class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 placeholder-gray-500" 
                      />
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                      <div class="space-y-2">
                        <label class="text-gray-400 text-sm font-medium">Start Date</label>
                        <div class="space-y-2">
                          <input 
                            :value="experience.start_month"
                            readonly
                            class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200"
                          />
                          <input 
                            :value="experience.start_year"
                            readonly
                            class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200"
                          />
                        </div>
                      </div>

                      <div class="space-y-2">
                        <label class="text-gray-400 text-sm font-medium">End Date</label>
                        <div class="space-y-2">
                          <input 
                            :value="experience.end_month"
                            readonly
                            class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200"
                          />
                          <input 
                            :value="experience.end_year"
                            readonly
                            class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200"
                          />
                        </div>
                      </div>
                    </div>
                  </div>

                  <button 
                    type="button"
                    @click="removeExperience(experience.id)"
                    :disabled="saving"
                    class="px-4 py-2 bg-gray-700 border border-gray-600 text-gray-300 rounded-lg hover:bg-red-900 hover:border-red-700 hover:text-red-300 transition-all duration-300 disabled:opacity-50"
                  >
                    🗑️ Remove
                  </button>
                </div>

                <!-- Add New Experience -->
                <div class="bg-gray-800 border border-gray-700 rounded-lg p-6">
                  <h3 class="text-xl font-bold text-teal-400 mb-4">➕ Add New Experience</h3>
                  <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
                    <div class="space-y-4">
                      <input 
                        v-model="newExperience.title"
                        class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 placeholder-gray-500 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300" 
                        placeholder="Job Title" 
                      />
                      <input 
                        v-model="newExperience.company"
                        class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 placeholder-gray-500 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300" 
                        placeholder="Company" 
                      />
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                      <div class="space-y-2">
                        <label class="text-gray-400 text-sm font-medium">Start Date</label>
                        <div class="space-y-2">
                          <select 
                            v-model="newExperience.start_month"
                            class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300"
                          >
                            <option v-for="month in months" :key="month" :value="month">{{ month }}</option>
                          </select>
                          <select 
                            v-model="newExperience.start_year"
                            class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300"
                          >
                            <option v-for="year in years" :key="year" :value="year">{{ year }}</option>
                          </select>
                        </div>
                      </div>

                      <div class="space-y-2">
                        <label class="text-gray-400 text-sm font-medium">End Date</label>
                        <div class="space-y-2">
                          <select 
                            v-model="newExperience.end_month"
                            class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300"
                          >
                            <option value="Present">Present</option>
                            <option v-for="month in months" :key="month" :value="month">{{ month }}</option>
                          </select>
                          <select 
                            v-model="newExperience.end_year"
                            class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300"
                          >
                            <option v-for="year in years" :key="year" :value="year">{{ year }}</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button 
                    type="button"
                    @click="addExperience"
                    :disabled="saving"
                    class="w-full p-3 bg-teal-500 text-black rounded-lg hover:bg-teal-400 transition-all duration-300 font-medium disabled:opacity-50"
                  >
                    💼 Add Experience
                  </button>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- Skills Section -->
        <section class="group">
          <div class="bg-gray-900 border border-gray-800 rounded-lg p-8 transition-all duration-300 hover:border-teal-500/50">
            <div class="flex items-center gap-3 mb-6">
              <div class="w-12 h-12 bg-teal-500 rounded-lg flex items-center justify-center">
                <span class="text-2xl text-black">💡</span>
              </div>
              <h2 class="text-3xl font-bold text-teal-400">Skills</h2>
            </div>
            
            <div class="space-y-6">
              <div v-if="loading.about" class="text-center text-gray-400">
                Loading skills...
              </div>
              <div v-else class="flex flex-wrap gap-3">
                <div 
                  v-for="(skill, index) in form.skills" 
                  :key="index"
                  class="bg-gray-800 border border-gray-700 px-4 py-2 rounded-full flex items-center gap-2 transition-all duration-300 hover:border-teal-500/50"
                >
                  <span class="text-gray-200 font-medium">{{ skill }}</span>
                  <button 
                    type="button"
                    @click="removeSkill(index)"
                    class="text-gray-400 hover:text-red-400 transition-colors duration-200"
                  >
                    ❌
                  </button>
                </div>
                
                <div v-if="form.skills.length === 0" class="text-gray-400 italic">
                  No skills added yet. Add your first skill below!
                </div>
              </div>

              <div class="flex gap-3">
                <input 
                  v-model="newSkill"
                  @keydown.enter.prevent="addSkill"
                  placeholder="Add a skill..." 
                  class="flex-grow p-3 bg-gray-800 border border-gray-700 rounded-lg text-gray-200 placeholder-gray-500 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300" 
                />
                <button 
                  type="button"
                  @click="addSkill"
                  class="px-6 py-3 bg-teal-500 text-black rounded-lg hover:bg-teal-400 transition-all duration-300 font-medium"
                >
                  ➕ Add
                </button>
              </div>
            </div>
          </div>
        </section>

        <!-- Awards Section -->
        <section class="group">
          <div class="bg-gray-900 border border-gray-800 rounded-lg p-8 transition-all duration-300 hover:border-teal-500/50">
            <div class="flex items-center gap-3 mb-6">
              <div class="w-12 h-12 bg-teal-500 rounded-lg flex items-center justify-center">
                <span class="text-2xl text-black">🏆</span>
              </div>
              <h2 class="text-3xl font-bold text-teal-400">Awards & Certificates</h2>
            </div>

            <div class="space-y-6">
              <div v-if="loading.awards" class="text-center text-gray-400">
                Loading awards...
              </div>
              <div v-else class="space-y-4">
                <div v-for="award in awards" :key="award.id" class="bg-gray-800 border border-gray-700 rounded-lg p-6 transition-all duration-300 hover:border-gray-600">
                  <div class="flex flex-col lg:flex-row gap-6">
                    <div class="flex-grow space-y-4">
                      <div class="space-y-2">
                        <h3 class="text-xl font-bold text-white">{{ award.name }}</h3>
                        <p class="text-gray-300">🏢 <span class="font-medium">{{ award.company }}</span></p>
                        <p class="text-gray-400">📅 Expires: {{ formatDate(award.expiry) }}</p>
                        <a :href="award.link" class="inline-flex items-center gap-2 text-teal-400 hover:text-teal-300 transition-colors duration-200">
                          🔗 View Certificate
                        </a>
                      </div>

                      <div class="mt-4" v-if="award.image">
                        <img :src="award.image" alt="Award Photo" class="max-w-xs rounded-lg border border-gray-600" />
                      </div>
                    </div>

                    <div class="flex lg:flex-col gap-3">
                      <button 
                        type="button"
                        @click="removeAward(award.id)"
                        :disabled="saving"
                        class="px-4 py-2 bg-gray-700 border border-gray-600 text-gray-300 rounded-lg hover:bg-red-900 hover:border-red-700 hover:text-red-300 transition-all duration-300 disabled:opacity-50"
                      >
                        🗑️ Delete
                      </button>
                    </div>
                  </div>
                </div>

                <!-- Add New Award Form -->
                <div class="bg-gray-800 border border-gray-700 rounded-lg p-6">
                  <h3 class="text-xl font-bold text-teal-400 mb-4">➕ Add New Award</h3>
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input 
                      v-model="newAward.name"
                      placeholder="Award name" 
                      class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 placeholder-gray-500 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300" 
                    />
                    <input 
                      v-model="newAward.company"
                      placeholder="Issuing Company" 
                      class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 placeholder-gray-500 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300" 
                    />
                    <input 
                      type="date" 
                      v-model="newAward.expiry"
                      class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300" 
                    />
                    <input 
                      v-model="newAward.link"
                      placeholder="Certificate link" 
                      class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 placeholder-gray-500 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300" 
                    />
                  </div>
                  <button 
                    type="button" 
                    @click="addAward"
                    :disabled="saving"
                    class="w-full mt-4 p-3 bg-teal-500 text-black rounded-lg hover:bg-teal-400 transition-all duration-300 font-medium disabled:opacity-50"
                  >
                    🏆 Add Award
                  </button>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- Portfolio Section -->
        <section class="group">
          <div class="bg-gray-900 border border-gray-800 rounded-lg p-8 transition-all duration-300 hover:border-teal-500/50">
            <div class="flex items-center gap-3 mb-6">
              <div class="w-12 h-12 bg-teal-500 rounded-lg flex items-center justify-center">
                <span class="text-2xl text-black">📂</span>
              </div>
              <h2 class="text-3xl font-bold text-teal-400">Portfolio</h2>
            </div>

            <div class="space-y-6">
              <div v-if="loading.projects" class="text-center text-gray-400">
                Loading projects...
              </div>
              <div v-else>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                  <div v-for="project in projects" :key="project.id" class="bg-gray-800 border border-gray-700 rounded-lg overflow-hidden transition-all duration-300 hover:border-gray-600">
                    <div class="relative h-48 overflow-hidden">
                      <img 
                        :src="project.image || 'https://via.placeholder.com/400x200/1f2937/ffffff?text=' + encodeURIComponent(project.name)"
                        alt="Project Image" 
                        class="w-full h-full object-cover"
                      />
                    </div>
                    
                    <div class="p-6">
                      <h3 class="text-xl font-bold text-white mb-2">{{ project.name }}</h3>
                      <p class="text-gray-300 text-sm mb-4">{{ project.description }}</p>
                      
                      <div class="flex flex-wrap gap-2 mb-4">
                        <span v-for="tech in projectTechnologies(project)" :key="tech" class="px-3 py-1 text-xs font-medium bg-gray-700 border border-gray-600 text-gray-300 rounded-full">
                          {{ tech }}
                        </span>
                      </div>

                      <div class="flex justify-between items-center">
                        <a 
                          :href="project.link"
                          class="inline-flex items-center gap-2 px-4 py-2 bg-gray-700 border border-gray-600 text-teal-400 rounded-lg hover:bg-gray-600 transition-all duration-300"
                        >
                          🔗 Visit Project
                        </a>
                        
                        <button 
                          type="button"
                          @click="removeProject(project.id)"
                          :disabled="saving"
                          class="px-4 py-2 bg-gray-700 border border-gray-600 text-gray-300 rounded-lg hover:bg-red-900 hover:border-red-700 hover:text-red-300 transition-all duration-300 disabled:opacity-50"
                        >
                          🗑️ Delete
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Add New Project Form -->
                <div class="bg-gray-800 border border-gray-700 rounded-lg p-6">
                  <h3 class="text-xl font-bold text-teal-400 mb-4">➕ Add New Project</h3>
                  
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                      <label class="text-gray-300 block text-sm font-medium mb-2">Project Name</label>
                      <input 
                        v-model="newProject.name"
                        placeholder="Enter project name" 
                        class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 placeholder-gray-500 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300" 
                      />
                    </div>

                    <div>
                      <label class="text-gray-300 block text-sm font-medium mb-2">Project Description</label>
                      <input 
                        v-model="newProject.description"
                        placeholder="Short description" 
                        class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 placeholder-gray-500 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300" 
                      />
                    </div>

                    <div>
                      <label class="text-gray-300 block text-sm font-medium mb-2">Programming Languages</label>
                      <input 
                        v-model="newProject.technologies"
                        placeholder="E.g. JavaScript, Vue, Laravel" 
                        class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 placeholder-gray-500 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300" 
                      />
                    </div>

                    <div>
                      <label class="text-gray-300 block text-sm font-medium mb-2">Project Link</label>
                      <input 
                        v-model="newProject.link"
                        placeholder="https://example.com" 
                        class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 placeholder-gray-500 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300" 
                      />
                    </div>
                  </div>

                  <button 
                    type="button"
                    @click="addProject"
                    :disabled="saving"
                    class="w-full p-3 bg-teal-500 text-black rounded-lg hover:bg-teal-400 transition-all duration-300 font-medium disabled:opacity-50"
                  >
                    📂 Add Project
                  </button>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- Save Button -->
        <div class="sticky bottom-6 z-10">
          <button 
            type="submit"
            :disabled="saving"
            class="w-full p-4 bg-teal-500 text-black text-xl font-bold rounded-lg hover:bg-teal-400 transition-all duration-300 shadow-lg disabled:opacity-50 disabled:cursor-not-allowed"
          >
            <span v-if="saving">💾 Saving...</span>
            <span v-else>💾 {{ form.id ? 'Update' : 'Save' }} Portfolio Data</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import axios from 'axios';
import { onMounted, reactive, ref, computed } from 'vue';

// Reactive data
const form = reactive({
  id: null,
  description: '',
  skills: []
});

const experiences = ref([]);
const awards = ref([]);
const projects = ref([]);

const newSkill = ref('');
const newExperience = ref({
  title: '',
  company: '',
  start_month: 'January',
  start_year: new Date().getFullYear().toString(),
  end_month: 'Present',
  end_year: new Date().getFullYear().toString()
});
const newAward = ref({
  name: '',
  company: '',
  expiry: '',
  link: ''
});
const newProject = ref({
  name: '',
  description: '',
  technologies: '',
  link: ''
});

const loading = reactive({
  about: true,
  experiences: true,
  awards: true,
  projects: true
});

const saving = ref(false);
const error = ref(null);

// Computed properties
const months = computed(() => [
  'January', 'February', 'March', 'April', 'May', 'June',
  'July', 'August', 'September', 'October', 'November', 'December'
]);

const years = computed(() => 
  Array.from({ length: 20 }, (_, i) => (new Date().getFullYear() - i).toString())
);

// Utility functions
const formatDate = (dateString) => {
  if (!dateString) return 'No expiry';
  return new Date(dateString).toLocaleDateString();
};

const projectTechnologies = (project) => {
  if (typeof project.technologies === 'string') {
    return project.technologies.split(',').map(tech => tech.trim()).filter(Boolean);
  }
  return Array.isArray(project.technologies) ? project.technologies : [];
};

// API Functions
const getAbout = async () => {
  try {
    loading.about = true;
    const response = await axios.get('/api/abouts');

    const abouts = Array.isArray(response?.data?.abouts)
      ? response.data.abouts
      : Array.isArray(response?.data)
        ? response.data
        : [];

    if (abouts.length > 0) {
      const aboutData = abouts[0] || {};
      form.id = aboutData.id ?? null;
      form.description = aboutData.description ?? '';
      // Normalize skills into an array
      if (typeof aboutData.skills === 'string') {
        form.skills = aboutData.skills
          ? aboutData.skills.split(',').map(skill => skill.trim()).filter(Boolean)
          : [];
      } else if (Array.isArray(aboutData.skills)) {
        form.skills = aboutData.skills;
      } else {
        form.skills = [];
      }
    } else {
      form.id = null;
      form.description = '';
      form.skills = [];
    }

    error.value = null;
  } catch (err) {
    console.error('Error fetching about data:', err);
    error.value = 'Error loading about data';
  } finally {
    loading.about = false;
  }
};

const getExperiences = async () => {
  try {
    loading.experiences = true;
    const response = await axios.get('/api/experiences');
    experiences.value = response.data.experiences || response.data || [];
    error.value = null;
  } catch (err) {
    console.error('Error fetching experiences:', err);
    error.value = 'Error loading experiences';
  } finally {
    loading.experiences = false;
  }
};

const getAwards = async () => {
  try {
    loading.awards = true;
    const response = await axios.get('/api/awards');
    awards.value = response.data.awards || response.data || [];
    error.value = null;
  } catch (err) {
    console.error('Error fetching awards:', err);
    error.value = 'Error loading awards';
  } finally {
    loading.awards = false;
  }
};

const getProjects = async () => {
  try {
    loading.projects = true;
    const response = await axios.get('/api/projects');
    projects.value = response.data.projects || response.data || [];
    error.value = null;
  } catch (err) {
    console.error('Error fetching projects:', err);
    error.value = 'Error loading projects';
  } finally {
    loading.projects = false;
  }
};

// Save about data
const saveAbout = async () => {
  try {
    saving.value = true;
    
    const skillsString = form.skills.join(',');
    const payload = {
      description: form.description,
      skills: skillsString
    };

    if (form.id) {
      // Update existing
      await axios.put(`/api/abouts/${form.id}`, payload);
      alert('About section updated successfully!');
    } else {
      // Create new
      const response = await axios.post('/api/abouts', payload);
      form.id = response.data.about.id;
      alert('About section created successfully!');
    }
  } catch (err) {
    console.error('Error saving about data:', err);
    error.value = 'Error saving about data';
  } finally {
    saving.value = false;
  }
};

// Skills management
const addSkill = () => {
  if (newSkill.value.trim() && !form.skills.includes(newSkill.value.trim())) {
    form.skills.push(newSkill.value.trim());
    newSkill.value = '';
  }
};

const removeSkill = (index) => {
  form.skills.splice(index, 1);
};

// Experience management
const addExperience = async () => {
  if (newExperience.value.title && newExperience.value.company) {
    try {
      saving.value = true;
      const response = await axios.post('/api/experiences', newExperience.value);
      experiences.value.push(response.data.experience || response.data);
      newExperience.value = {
        title: '',
        company: '',
        start_month: 'January',
        start_year: new Date().getFullYear().toString(),
        end_month: 'Present',
        end_year: new Date().getFullYear().toString()
      };
      alert('Experience added successfully!');
    } catch (err) {
      console.error('Error adding experience:', err);
      error.value = 'Error adding experience';
    } finally {
      saving.value = false;
    }
  }
};

const removeExperience = async (id) => {
  try {
    saving.value = true;
    await axios.delete(`/api/experiences/${id}`);
    experiences.value = experiences.value.filter(exp => exp.id !== id);
    alert('Experience removed successfully!');
  } catch (err) {
    console.error('Error removing experience:', err);
    error.value = 'Error removing experience';
  } finally {
    saving.value = false;
  }
};

// Awards management
const addAward = async () => {
  if (newAward.value.name && newAward.value.company) {
    try {
      saving.value = true;
      const response = await axios.post('/api/awards', newAward.value);
      awards.value.push(response.data.award || response.data);
      newAward.value = { name: '', company: '', expiry: '', link: '' };
      alert('Award added successfully!');
    } catch (err) {
      console.error('Error adding award:', err);
      error.value = 'Error adding award';
    } finally {
      saving.value = false;
    }
  }
};

const removeAward = async (id) => {
  try {
    saving.value = true;
    await axios.delete(`/api/awards/${id}`);
    awards.value = awards.value.filter(award => award.id !== id);
    alert('Award removed successfully!');
  } catch (err) {
    console.error('Error removing award:', err);
    error.value = 'Error removing award';
  } finally {
    saving.value = false;
  }
};

// Projects management
const addProject = async () => {
  if (newProject.value.name && newProject.value.description) {
    try {
      saving.value = true;
      const response = await axios.post('/api/projects', newProject.value);
      projects.value.push(response.data.project || response.data);
      newProject.value = { name: '', description: '', technologies: '', link: '' };
      alert('Project added successfully!');
    } catch (err) {
      console.error('Error adding project:', err);
      error.value = 'Error adding project';
    } finally {
      saving.value = false;
    }
  }
};

const removeProject = async (id) => {
  try {
    saving.value = true;
    await axios.delete(`/api/projects/${id}`);
    projects.value = projects.value.filter(project => project.id !== id);
    alert('Project removed successfully!');
  } catch (err) {
    console.error('Error removing project:', err);
    error.value = 'Error removing project';
  } finally {
    saving.value = false;
  }
};

// Handle form submission
const handleSubmit = async (event) => {
  event.preventDefault();
  await saveAbout();
};

// Load all data when component mounts
onMounted(async () => {
  await Promise.all([
    getAbout(),
    getExperiences(),
    getAwards(),
    getProjects()
  ]);
});
</script>