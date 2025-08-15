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
      <form class="space-y-8">
        
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
              <textarea
                class="w-full p-4 bg-gray-800 border border-gray-700 rounded-lg text-gray-200 placeholder-gray-500 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300 resize-none"
                rows="5"
                placeholder="Tell us about yourself..."
              >I am a passionate full-stack developer with expertise in modern web technologies. I enjoy creating innovative solutions and have experience working with various programming languages and frameworks.</textarea>
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
              <!-- Experience Item 1 -->
              <div class="bg-gray-800 border border-gray-700 rounded-lg p-6 transition-all duration-300 hover:border-gray-600">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
                  <div class="space-y-4">
                    <input 
                      value="Senior Software Developer"
                      class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 placeholder-gray-500 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300" 
                      placeholder="Job Title" 
                    />
                    <input 
                      value="Tech Solutions Inc."
                      class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 placeholder-gray-500 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300" 
                      placeholder="Company" 
                    />
                  </div>

                  <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                      <label class="text-gray-400 text-sm font-medium">Start Date</label>
                      <div class="space-y-2">
                        <select class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300">
                          <option>January</option>
                        </select>
                        <select class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300">
                          <option>2022</option>
                        </select>
                      </div>
                    </div>

                    <div class="space-y-2">
                      <label class="text-gray-400 text-sm font-medium">End Date</label>
                      <div class="space-y-2">
                        <select class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300">
                          <option>Present</option>
                        </select>
                        <select class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300">
                          <option>2024</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <button 
                  type="button"
                  class="px-4 py-2 bg-gray-700 border border-gray-600 text-gray-300 rounded-lg hover:bg-red-900 hover:border-red-700 hover:text-red-300 transition-all duration-300"
                >
                  🗑️ Remove
                </button>
              </div>

              <!-- Experience Item 2 -->
              <div class="bg-gray-800 border border-gray-700 rounded-lg p-6 transition-all duration-300 hover:border-gray-600">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
                  <div class="space-y-4">
                    <input 
                      value="Junior Web Developer"
                      class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 placeholder-gray-500 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300" 
                      placeholder="Job Title" 
                    />
                    <input 
                      value="Digital Agency Pro"
                      class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 placeholder-gray-500 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300" 
                      placeholder="Company" 
                    />
                  </div>

                  <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                      <label class="text-gray-400 text-sm font-medium">Start Date</label>
                      <div class="space-y-2">
                        <select class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300">
                          <option>June</option>
                        </select>
                        <select class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300">
                          <option>2020</option>
                        </select>
                      </div>
                    </div>

                    <div class="space-y-2">
                      <label class="text-gray-400 text-sm font-medium">End Date</label>
                      <div class="space-y-2">
                        <select class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300">
                          <option>December</option>
                        </select>
                        <select class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300">
                          <option>2021</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <button 
                  type="button"
                  class="px-4 py-2 bg-gray-700 border border-gray-600 text-gray-300 rounded-lg hover:bg-red-900 hover:border-red-700 hover:text-red-300 transition-all duration-300"
                >
                  🗑️ Remove
                </button>
              </div>

              <button 
                type="button"
                class="w-full p-4 border-2 border-dashed border-gray-700 text-teal-400 rounded-lg hover:border-teal-500 hover:bg-gray-800 transition-all duration-300 flex items-center justify-center gap-2"
              >
                <span class="text-xl">➕</span> Add Experience
              </button>
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
              <div class="flex flex-wrap gap-3">
                <div class="bg-gray-800 border border-gray-700 px-4 py-2 rounded-full flex items-center gap-2 transition-all duration-300 hover:border-teal-500/50">
                  <span class="text-gray-200 font-medium">JavaScript</span>
                  <button 
                    type="button"
                    class="text-gray-400 hover:text-red-400 transition-colors duration-200"
                  >
                    ❌
                  </button>
                </div>

                <div class="bg-gray-800 border border-gray-700 px-4 py-2 rounded-full flex items-center gap-2 transition-all duration-300 hover:border-teal-500/50">
                  <span class="text-gray-200 font-medium">Vue.js</span>
                  <button 
                    type="button"
                    class="text-gray-400 hover:text-red-400 transition-colors duration-200"
                  >
                    ❌
                  </button>
                </div>

                <div class="bg-gray-800 border border-gray-700 px-4 py-2 rounded-full flex items-center gap-2 transition-all duration-300 hover:border-teal-500/50">
                  <span class="text-gray-200 font-medium">Laravel</span>
                  <button 
                    type="button"
                    class="text-gray-400 hover:text-red-400 transition-colors duration-200"
                  >
                    ❌
                  </button>
                </div>

                <div class="bg-gray-800 border border-gray-700 px-4 py-2 rounded-full flex items-center gap-2 transition-all duration-300 hover:border-teal-500/50">
                  <span class="text-gray-200 font-medium">PHP</span>
                  <button 
                    type="button"
                    class="text-gray-400 hover:text-red-400 transition-colors duration-200"
                  >
                    ❌
                  </button>
                </div>

                <div class="bg-gray-800 border border-gray-700 px-4 py-2 rounded-full flex items-center gap-2 transition-all duration-300 hover:border-teal-500/50">
                  <span class="text-gray-200 font-medium">MySQL</span>
                  <button 
                    type="button"
                    class="text-gray-400 hover:text-red-400 transition-colors duration-200"
                  >
                    ❌
                  </button>
                </div>

                <div class="bg-gray-800 border border-gray-700 px-4 py-2 rounded-full flex items-center gap-2 transition-all duration-300 hover:border-teal-500/50">
                  <span class="text-gray-200 font-medium">Tailwind CSS</span>
                  <button 
                    type="button"
                    class="text-gray-400 hover:text-red-400 transition-colors duration-200"
                  >
                    ❌
                  </button>
                </div>
              </div>

              <div class="flex gap-3">
                <input 
                  placeholder="Add a skill..." 
                  class="flex-grow p-3 bg-gray-800 border border-gray-700 rounded-lg text-gray-200 placeholder-gray-500 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300" 
                />
                <button 
                  type="button"
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
              <div class="space-y-4">
                <!-- Award Item 1 -->
                <div class="bg-gray-800 border border-gray-700 rounded-lg p-6 transition-all duration-300 hover:border-gray-600">
                  <div class="flex flex-col lg:flex-row gap-6">
                    <div class="flex-grow space-y-4">
                      <div class="space-y-2">
                        <h3 class="text-xl font-bold text-white">Certified Laravel Developer</h3>
                        <p class="text-gray-300">🏢 <span class="font-medium">Laravel LLC</span></p>
                        <p class="text-gray-400">📅 Expires: 2025-12-31</p>
                        <a href="#" class="inline-flex items-center gap-2 text-teal-400 hover:text-teal-300 transition-colors duration-200">
                          🔗 View Certificate
                        </a>
                      </div>

                      <div class="mt-4">
                        <img src="https://via.placeholder.com/300x200/1f2937/ffffff?text=Certificate" alt="Award Photo" class="max-w-xs rounded-lg border border-gray-600" />
                      </div>
                    </div>

                    <div class="flex lg:flex-col gap-3">
                      <button 
                        class="px-4 py-2 bg-gray-700 border border-gray-600 text-gray-300 rounded-lg hover:bg-teal-900 hover:border-teal-700 hover:text-teal-300 transition-all duration-300"
                      >
                        ✏️ Edit
                      </button>

                      <button 
                        type="button"
                        class="px-4 py-2 bg-gray-700 border border-gray-600 text-gray-300 rounded-lg hover:bg-red-900 hover:border-red-700 hover:text-red-300 transition-all duration-300"
                      >
                        🗑️ Delete
                      </button>
                    </div>
                  </div>
                </div>

                <!-- Award Item 2 -->
                <div class="bg-gray-800 border border-gray-700 rounded-lg p-6 transition-all duration-300 hover:border-gray-600">
                  <div class="flex flex-col lg:flex-row gap-6">
                    <div class="flex-grow space-y-4">
                      <div class="space-y-2">
                        <h3 class="text-xl font-bold text-white">Vue.js Professional Certification</h3>
                        <p class="text-gray-300">🏢 <span class="font-medium">Vue School</span></p>
                        <p class="text-gray-400">📅 Expires: 2024-08-15</p>
                        <a href="#" class="inline-flex items-center gap-2 text-teal-400 hover:text-teal-300 transition-colors duration-200">
                          🔗 View Certificate
                        </a>
                      </div>

                      <div class="mt-4">
                        <img src="https://via.placeholder.com/300x200/1f2937/ffffff?text=Vue+Certificate" alt="Award Photo" class="max-w-xs rounded-lg border border-gray-600" />
                      </div>
                    </div>

                    <div class="flex lg:flex-col gap-3">
                      <button 
                        class="px-4 py-2 bg-gray-700 border border-gray-600 text-gray-300 rounded-lg hover:bg-teal-900 hover:border-teal-700 hover:text-teal-300 transition-all duration-300"
                      >
                        ✏️ Edit
                      </button>

                      <button 
                        type="button"
                        class="px-4 py-2 bg-gray-700 border border-gray-600 text-gray-300 rounded-lg hover:bg-red-900 hover:border-red-700 hover:text-red-300 transition-all duration-300"
                      >
                        🗑️ Delete
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Add New Award Form -->
              <div class="bg-gray-800 border border-gray-700 rounded-lg p-6">
                <h3 class="text-xl font-bold text-teal-400 mb-4">➕ Add New Award</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <input placeholder="Award name" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 placeholder-gray-500 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300" />
                  <input placeholder="Issuing Company" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 placeholder-gray-500 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300" />
                  <input type="date" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300" />
                  <input placeholder="Certificate link" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 placeholder-gray-500 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300" />
                  <div class="md:col-span-2">
                    <input type="file" class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-none file:bg-teal-500 file:text-black file:font-medium hover:file:bg-teal-400 transition-all duration-300" accept="image/*" />
                  </div>
                </div>
                <button type="button" class="w-full mt-4 p-3 bg-teal-500 text-black rounded-lg hover:bg-teal-400 transition-all duration-300 font-medium">
                  🏆 Add Award
                </button>
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
              <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Project 1 -->
                <div class="bg-gray-800 border border-gray-700 rounded-lg overflow-hidden transition-all duration-300 hover:border-gray-600">
                  <div class="relative h-48 overflow-hidden">
                    <img 
                      src="https://via.placeholder.com/400x200/1f2937/ffffff?text=E-commerce+Platform" 
                      alt="Project Image" 
                      class="w-full h-full object-cover"
                    />
                  </div>
                  
                  <div class="p-6">
                    <h3 class="text-xl font-bold text-white mb-2">E-commerce Platform</h3>
                    <p class="text-gray-300 text-sm mb-4">A full-featured online shopping platform with payment integration and admin dashboard.</p>
                    
                    <div class="flex flex-wrap gap-2 mb-4">
                      <span class="px-3 py-1 text-xs font-medium bg-gray-700 border border-gray-600 text-gray-300 rounded-full flex items-center gap-2">
                        Laravel
                        <button class="text-gray-500 hover:text-red-400 transition-colors duration-200">❌</button>
                      </span>
                      <span class="px-3 py-1 text-xs font-medium bg-gray-700 border border-gray-600 text-gray-300 rounded-full flex items-center gap-2">
                        Vue.js
                        <button class="text-gray-500 hover:text-red-400 transition-colors duration-200">❌</button>
                      </span>
                      <span class="px-3 py-1 text-xs font-medium bg-gray-700 border border-gray-600 text-gray-300 rounded-full flex items-center gap-2">
                        MySQL
                        <button class="text-gray-500 hover:text-red-400 transition-colors duration-200">❌</button>
                      </span>
                    </div>

                    <div class="flex justify-between items-center">
                      <a 
                        href="#"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-gray-700 border border-gray-600 text-teal-400 rounded-lg hover:bg-gray-600 transition-all duration-300"
                      >
                        🔗 Visit Project
                      </a>
                      
                      <button 
                        type="button"
                        class="px-4 py-2 bg-gray-700 border border-gray-600 text-gray-300 rounded-lg hover:bg-red-900 hover:border-red-700 hover:text-red-300 transition-all duration-300"
                      >
                        🗑️ Delete
                      </button>
                    </div>
                  </div>
                </div>

                <!-- Project 2 -->
                <div class="bg-gray-800 border border-gray-700 rounded-lg overflow-hidden transition-all duration-300 hover:border-gray-600">
                  <div class="relative h-48 overflow-hidden">
                    <img 
                      src="https://via.placeholder.com/400x200/1f2937/ffffff?text=Task+Management+App" 
                      alt="Project Image" 
                      class="w-full h-full object-cover"
                    />
                  </div>
                  
                  <div class="p-6">
                    <h3 class="text-xl font-bold text-white mb-2">Task Management App</h3>
                    <p class="text-gray-300 text-sm mb-4">A collaborative task management application with real-time updates and team features.</p>
                    
                    <div class="flex flex-wrap gap-2 mb-4">
                      <span class="px-3 py-1 text-xs font-medium bg-gray-700 border border-gray-600 text-gray-300 rounded-full flex items-center gap-2">
                        Node.js
                        <button class="text-gray-500 hover:text-red-400 transition-colors duration-200">❌</button>
                      </span>
                      <span class="px-3 py-1 text-xs font-medium bg-gray-700 border border-gray-600 text-gray-300 rounded-full flex items-center gap-2">
                        React
                        <button class="text-gray-500 hover:text-red-400 transition-colors duration-200">❌</button>
                      </span>
                      <span class="px-3 py-1 text-xs font-medium bg-gray-700 border border-gray-600 text-gray-300 rounded-full flex items-center gap-2">
                        MongoDB
                        <button class="text-gray-500 hover:text-red-400 transition-colors duration-200">❌</button>
                      </span>
                    </div>

                    <div class="flex justify-between items-center">
                      <a 
                        href="#"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-gray-700 border border-gray-600 text-teal-400 rounded-lg hover:bg-gray-600 transition-all duration-300"
                      >
                        🔗 Visit Project
                      </a>
                      
                      <button 
                        type="button"
                        class="px-4 py-2 bg-gray-700 border border-gray-600 text-gray-300 rounded-lg hover:bg-red-900 hover:border-red-700 hover:text-red-300 transition-all duration-300"
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
                      placeholder="Enter project name" 
                      class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 placeholder-gray-500 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300" 
                    />
                  </div>

                  <div>
                    <label class="text-gray-300 block text-sm font-medium mb-2">Project Description</label>
                    <input 
                      placeholder="Short description" 
                      class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 placeholder-gray-500 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300" 
                    />
                  </div>

                  <div>
                    <label class="text-gray-300 block text-sm font-medium mb-2">Programming Languages</label>
                    <input 
                      placeholder="E.g. JavaScript, Vue, Laravel" 
                      class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 placeholder-gray-500 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300" 
                    />
                  </div>

                  <div>
                    <label class="text-gray-300 block text-sm font-medium mb-2">Project Link</label>
                    <input 
                      placeholder="https://example.com" 
                      class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 placeholder-gray-500 focus:border-teal-500 focus:ring-1 focus:ring-teal-500/50 transition-all duration-300" 
                    />
                  </div>

                  <div class="md:col-span-2">
                    <label class="text-gray-300 block text-sm font-medium mb-2">Project Image</label>
                    <input
                      type="file" 
                      class="w-full p-3 bg-gray-700 border border-gray-600 rounded-lg text-gray-200 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-none file:bg-teal-500 file:text-black file:font-medium hover:file:bg-teal-400 transition-all duration-300"
                      accept="image/*"
                    />
                  </div>
                </div>

                <button 
                  type="button"
                  class="w-full p-3 bg-teal-500 text-black rounded-lg hover:bg-teal-400 transition-all duration-300 font-medium"
                >
                  📂 Add Project
                </button>
              </div>
            </div>
          </div>
        </section>

        <!-- Save Button -->
        <div class="sticky bottom-6 z-10">
          <button 
            type="submit"
            class="w-full p-4 bg-teal-500 text-black text-xl font-bold rounded-lg hover:bg-teal-400 transition-all duration-300 shadow-lg"
          >
            💾 Save Portfolio
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
// Static version - no reactive functionality
console.log("Static Admin UI loaded");
</script>