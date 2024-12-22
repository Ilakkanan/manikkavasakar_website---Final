<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quiz Rules: ') }} {{ $quiz->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>{{ __('Quiz Rules for ') }}{{ $quiz->title }}</h3>

                    <!-- Dynamic Quiz Information from the Database -->
                    <div class="mt-4">
                        <p><strong>Quiz Title:</strong> {{ $quiz->title }}</p>
                        <p><strong>Grade:</strong> {{ $quiz->grade }}</p>
                        <p><strong>Time Limit:</strong> {{ $quiz->time }}</p>
                        <p><strong>Attempts:</strong> {{ $quiz->max_attempts }}</p>
                    </div>

                    <div class="mt-4">
                        <h4 class="font-semibold text-lg">தகுதிச் சட்டம்:</h4>
                        <p>பங்கேற்பாளர்கள் பதிவு செய்யப்பட்ட பயனர்களாக இருக்க வேண்டும் அல்லது க்விஸ் தொடங்குவதற்கு முன் அடிப்படை தகவல்களை வழங்க வேண்டும்.</p>
                        <p>க்விஸ் ஒரு குறிப்பிட்ட வயதினருக்கோ அல்லது பிராந்தியத்திற்கோ மட்டுமே கட்டுப்படுத்தப்படலாம்.</p>

                        <h4 class="font-semibold text-lg mt-4">காலம் வரம்பு:</h4>
                        <p>ஒவ்வொரு பங்கேற்பாளருக்கும் க்விஸ் முடிக்க ஒரு குறிப்பிட்ட நேர வரம்பு இருக்கும், அது கேள்விக்கோ அல்லது முழு க்விஸ் க்கோ இருக்கலாம்.</p>
                        <p>நேரம் முடிந்த பிறகு, பங்கேற்பாளர்கள் மீதமுள்ள கேள்விகளுக்கு பதில் அளிக்க முடியாது.</p>

                        <h4 class="font-semibold text-lg mt-4">கேள்வி வடிவம்:</h4>
                        <p>க்விஸில் பல்வேறு வகையான கேள்விகள் (அல்லது எளிதான, சிக்கலான கேள்விகள்), உரைத்தவிர துல்லியமான பதில்களுடன் இருக்கலாம்.</p>
                        <p>ஒவ்வொரு கேள்விக்கும் பதில் அளிக்க வேண்டும், பிறகு அடுத்த கேள்விக்கு செல்ல வேண்டும்.</p>

                        <h4 class="font-semibold text-lg mt-4">மதிப்பெண் அமைப்பு:</h4>
                        <p>ஒவ்வொரு சரியான பதிலுக்கும் மதிப்பெண்கள் வழங்கப்படும், சில கேள்விகள் மற்றவையிடம் அதிக மதிப்பெண்களை கொண்டிருக்கலாம்.</p>
                        <p>தவறான பதில்களுக்கு எப்போது எதுவும் மதிப்பெண்கள் தரப்படாது, அல்லது தவறான பதில்களுக்கு நெகட்டிவ் மதிப்பெண்கள் விடுத்துவிடப்படும்.</p>

                        <h4 class="font-semibold text-lg mt-4">அமைப்புகளை மாற்றுதல்:</h4>
                        <p>கேள்விகளின் வரிசையும் அல்லது பதில் விருப்பங்களும் மாற்றப்படலாம்.</p>
                        <p>பங்கேற்பாளர்கள் ஒரு குறிப்பிட்ட கேள்விக்கு பதில் அளிக்க விரும்பும் பொழுது கேள்வி வரிசைகள் துவங்குகின்றன.</p>

                        <h4 class="font-semibold text-lg mt-4">வெளிப்புற உதவி இல்லை:</h4>
                        <p>பங்கேற்பாளர்கள் கேள்விகளை தங்களை சார்ந்திருந்தே பதிலளிக்க வேண்டும்.</p>
                        <p>குவிஸ் செயல்பாட்டின் தவிர வேறு உதவிகளை நாடுவது அல்லது இணையத்தை பயன்படுத்துவது தடைசெய்யப்படுகிறது.</p>

                        <h4 class="font-semibold text-lg mt-4">பொறியியல் பிரச்சினைகள்:</h4>
                        <p>க்விஸின் போது எதையாவது தொழில்நுட்ப சிக்கல்கள் ஏற்படுமானால் (உதாரணமாக இணைப்பு பிரச்சினைகள்), பங்கேற்பாளர்கள் உடனடியாக அதனை அறிவிக்க வேண்டும்.</p>
                        <p>நேரம் நீட்டிப்பு அல்லது பிற மாற்றங்கள் ஏற்படுத்தப்படும்.</p>
                    </div>

                    <!-- Back Button -->
                    <a href="javascript:history.back()" class="quizList text-blue-500 underline mt-4 block">Go Back</a>

                    <!-- Quiz Participation Link -->
                    <a href="{{ route('student.quiz-participate', $quiz->id) }}" class="quizList text-green-500 underline mt-4 block">Participate Now</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<style>
    /* General layout and spacing */

h3, h4 {
    margin-top: 1rem;
    font-weight: 600;
}

/* Quiz Information Section */
div.mt-4 p {
    margin-bottom: 0.75rem;
}

div.mt-4 strong {
    color: #333;
    font-weight: bold;
}
.quizList  {
    display: inline-block;
    margin-top: 1rem;
    padding: 0.5rem 1rem;
    color: #fff;
    background-color: #6f0207;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    font-weight: bold;
}

.quizList:hover {
    background-color: #8a0d10;
}

/* Responsive styles */
@media (max-width: 768px) {
    .py-12 {
        padding-top: 2rem;
        padding-bottom: 2rem;
    }

    .text-gray-900 {
        font-size: 0.95rem;
    }

    h3, h4 {
        font-size: 1.2rem;
    }

    /* Adjust padding and text size for small screens */
    div.mt-4 p {
        font-size: 0.9rem;
    }

    a {
        font-size: 0.9rem;
        margin-top: 0.5rem;
    }
}

@media (max-width: 480px) {
    /* Adjust layout for very small screens */
    h3 {
        font-size: 1.1rem;
    }

    h4 {
        font-size: 1rem;
    }

    .text-gray-900 {
        font-size: 0.85rem;
    }

    div.mt-4 p {
        font-size: 0.8rem;
    }

    a {
        font-size: 0.8rem;
    }
}

</style>