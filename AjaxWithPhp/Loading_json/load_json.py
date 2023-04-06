import json

with open('Loading_json/districts.json') as json_file:
    json_data = json.load(json_file)

# print(json_data)
state_list = json_data.get('states')
print(state_list)

with open('Loading_json/district_list.txt','a') as file:
    for item in state_list:
        string = f"INSERT INTO districts(state,district) VALUES({item.get('state')}"
        for district in item.get('districts'):
            new_string = string + f",{district});\n"
            file.write(new_string) 
    
