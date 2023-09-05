from transformers import GPT2LMHeadModel, GPT2Tokenizer

model_name = "gpt2"
model = GPT2LMHeadModel.from_pretrained(model_name)
tokenizer = GPT2Tokenizer.from_pretrained(model_name)

topic_prompt = "Write a social media post about summer vacation:"
input_ids = tokenizer.encode(topic_prompt, return_tensors="pt")

max_length = 100  # Adjust as needed
generated_text = model.generate(input_ids, max_length=max_length, num_return_sequences=1)
generated_post = tokenizer.decode(generated_text[0], skip_special_tokens=True)

print(generated_post)
